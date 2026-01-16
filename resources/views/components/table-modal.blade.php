<!-- Button to open modal -->
<button role="button" class="btn btn-sm m-1 {{ $buttonColor }}" data-bs-toggle="modal"
    data-bs-target=".form{{ $modalType }}{{ $id }}"><i class="fas {{ $buttonIcon }}"></i><span
        class="d-none d-sm-inline">
        {{ $buttonText }}</span></button>

<!-- Modal -->
<div class="modal fade form{{ $modalType }}{{ $id }}" tabindex="-1" role="dialog" aria-hidden="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">{{ $modalText }}</div>
            <div class="modal-footer">
                <form action="{{ $route }}" method="POST">
                    @csrf
                    @method($modalMethod)
                    <x-button.close />
                    <button type="submit" class="btn {{ $buttonColor }} btn-submit">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        <span class="btn-text">{{ $buttonText }}</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
