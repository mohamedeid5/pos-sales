<div class="modal fade" id="deleteModal{{ $itemCard->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ $itemCard->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.item-cards.destroy', $itemCard->id)}}" method="post">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="page_id" value="2">
                    <h5 style="font-family: 'Cairo', sans-serif;">are you sure to delete ({{ $itemCard->name }})?</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                        <button  class="btn btn-danger">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
