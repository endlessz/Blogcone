<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
    <form id="form-deleted" action="#" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE')}}

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" 
                            data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="deleteLabel">Delete?</h4>
                </div>
                <div class="modal-body">
                    <b>This is permanent delete.</b> 
                    Are you sure you want to delete this post: <b class="modal-post-title"></b>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Delete
                    </button>
                </div>	
            </div>
        </div>
    </form>
</div>
