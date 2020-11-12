<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use JD\Cloudder\Facades\Cloudder;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->isSuperAdmin()) {

            $invoices = Invoice::withTrashed()->latest()->paginate(8);
            return response()->json(['invoices' => $invoices,
                'user' => auth()->user()], 200);

        } elseif (auth()->user()->isMarketer()) {

            $marketerInvoices = auth()->user()->invoices()->withTrashed()->latest()->paginate(8);

            return response()->json(['invoices' => $marketerInvoices,
                'user' => auth()->user()], 200);
        } else {

            return response()->json(['invoices' => [],
                'user' => auth()->user()], 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {

        $request->validate([
            'client_name' => ['required', 'string'],
            'amount' => ['required'],
            'email' => ['required', 'email'],
            'segments' => ['required'],
            'document' => ['required'],
        ]);
        $fileName = Str::limit($request->client_name, 10);
        Cloudder::upload($request['document'],
            ($fileName . "-" . $request->amount), [
                'folder' => 'aura/',
            ]);
        $file_url = Cloudder::show(Cloudder::getPublicId(),
            ['format' => 'pdf']);

        $comma_separated = implode(",", $request->segments);

        $data = [
            'client_name' => Str::title($request->client_name),
            'amount' => $request->amount,
            'email' => $request->email,
            'segments' => $comma_separated,
            'document' => $file_url,
            'user_name' => $user->name,
        ];

        $invoice = $user->invoices()->create($data);

        if ($invoice) {
            return response()->json('Invoice was stored successfully!', 201);
        } else {
            return response()->json(
                'There was a problem while storing Invoice',
                500
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'client_name' => ['required', 'string'],
            'amount' => ['required'],
            'email' => ['required', 'email'],
            'segments' => ['required'],
            'document' => ['required'],
        ]);
        $use_existing_file = Str::containsAll($request->document, ['res.', 'cloudinary.']);

        if (!$use_existing_file) {
            $fileName = Str::limit($request->client_name, 10);
            Cloudder::upload($request['document'],
                ($fileName . "-" . $request->amount), [
                    'folder' => 'aura/',
                ]);
            $file_url = Cloudder::show(Cloudder::getPublicId(),
                ['format' => 'pdf']);
        } else {

            $file_url = $request->document;
        }
        $comma_separated = implode(",", $request->segments);

        $data = [
            'client_name' => Str::title($request->client_name),
            'amount' => $request->amount,
            'email' => $request->email,
            'segments' => $comma_separated,
            'document' => $file_url,
        ];

        $updatedInvoice = $invoice->update($data);

        if ($updatedInvoice) {
            return response()->json('Invoice was updated successfully!', 200);
        } else {
            return response()->json(
                'There was a problem while updating Invoice',
                500
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        if ($invoice->delete()) {
            return response()->json("Invoice has been removed successfully.", 200);
        }
    }

    /**
     * Restores the specified resource from storage.
     *
     * @param  \App\Invoice  $article
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        $invoice = Invoice::onlyTrashed()->findOrFail($request->id);
        if ($invoice->restore()) {
            return response()->json("Invoice has been restored successfully.", 200);
        }
    }

}
