<template>
    <transition name="modal">
        <div class="modal modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <!-- Header -->
                    <div class="modal-header">
                        <slot name="header"> </slot>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">
                        <slot name="body"> </slot>
                    </div>
                    <!-- Footer -->
                    <div class="modal-footer">
                        <div class="d-flex justify-content-between">
                            <button
                                class="btn btn-block btn-aura modal-default-button"
                                @click="$emit('close')"
                            >
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<style>
.modal-mask {
    position: fixed;
    z-index: 10000;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: table;
    transition: opacity 0.3s ease;
}

.modal-wrapper {
    display: table-cell;
    vertical-align: middle;
}

.modal-container {
    width: 80%;
    margin: 0px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
    transition: all 0.3s ease;
    font-family: Helvetica, Arial, sans-serif;
}

.modal-header h5 {
    margin-top: 0;
    font-weight: bold;
}

.modal-body {
    width: 100%;
    margin: 20px 0;
    max-height: 350px;
    overflow-y: auto;
    scroll-behavior: smooth;
}

.modal-default-button {
    float: left;
}

.modal-enter {
    opacity: 0;
}

.modal-leave-active {
    opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}

@media only screen and (max-width: 768px) {
    .modal-container {
        width: 100%;
        margin: 0px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
        transition: all 0.3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }
}
</style>
