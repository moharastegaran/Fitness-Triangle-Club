<div id="delete-modal" class="modal animated fade rotateInDownLeft custo-rotateInDownLeft" role="dialog"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">حذف آیتم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <p class="modal-text">آیا از حذف این آیتم مطمئن هستید ؟</p>
            </div>
            <div class="modal-footer md-button">
                <button class="btn" data-dismiss="modal" onclick="$('a.deletable').removeClass('deletable');"><i class="flaticon-cancel-12"></i>خیر</button>
                <button type="button" class="btn btn-primary" onclick="$('a.deletable').removeClass('deletable').prev('form').submit();">مطمئنم</button>
            </div>
        </div>
    </div>
</div>
