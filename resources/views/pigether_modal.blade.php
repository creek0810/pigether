<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover();
    });
</script>
</head>

<!-- Show Post Modal -->
<div id="show-post-modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="post-body">
                    <div class="propic-container" id="post-user-container">
                        <div class="propic-img">
                            <img src="https://images-na.ssl-images-amazon.com/images/I/51t3T95HZ%2BL._SX466_.jpg" alt="https://images-na.ssl-images-amazon.com/images/I/51t3T95HZ%2BL._SX466_.jpg" class="img-thumbnail " id="user-propic">
                        </div>
                        <p id="user-name"></p>
                        <a href="#" role="button" class="btn btn-primary popover-test" title="mail" data-content="" data-toggle="popover" data-placement="bottom" id="user-email">mail</a>
                        <a href="#" role="button" class="btn btn-success popover-test" title="line" data-content="" data-toggle="popover" data-placement="bottom" id="user-line">line</a>
                        <a href="#" role="button" class="btn btn-info popover-test" title="phone" data-content="" data-toggle="popover" data-placement="bottom" id="user-phone">phone</a>
                    </div>
                    <div class="content-container" id="post-show-container">
                        <div id="show-post-id" hidden></div>
                        <h3><b>
                                <div id="show-post-title"></div>
                            </b>
                        </h3>
                        <span style="font-size:small;">
                            <p id="show-post-update-time"></p>
                        </span>
                        <hr>
                        <h5>課堂資訊:</h5>
                        <div id="show-post-course"></div>
                        <hr>
                        <h5>隊友需求:</h5>
                        <div id="show-post-team-ability"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                <a class="btn button_color" href="#" id="edit">Edit</a>
            </div>
        </div>
    </div>
</div>

<!-- Show Post Modal -->
<div id="hint-post-modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">提醒</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                請先登入，才能發帖子喔~
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">確認</button>
            </div>
        </div>
    </div>
</div>
<!-- Create New Post modal -->

<div id="new-post-modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="post-modal-title">開始尋找您的隊友-由發帖子開始</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/pigether/newPost')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="new-post-title" class="col-form-label">標題:</label>
                        <input type="text" name="new-post-title" class="form-control" id="new-post-title">
                    </div>
                    <div class="form-group">
                        <label for="new-post-course" class="col-form-label">課程資訊:</label>
                        <textarea class="form-control" id="new-post-course" name="new-post-course"></textarea>
                        <label for="new-post-team-ability" class="col-form-label">隊友條件:</label>
                        <textarea class="form-control" id="new-post-team-ability" name="new-post-team-ability"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        @if(Auth::check())
                        <button type="submit" class="btn button_color" id="send-post">Send Post</button>
                        @else
                        <button type="submit" class="btn button_color" id="send-post" hidden>Send Post</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Or Delete Post Modal -->

<div id="edit-post-modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="post-modal-title">修改帖子</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/pigether/editPost')}}" method="POST" id="edif-form">
                    {{csrf_field()}}
                    <div class="form-group" hidden>
                        <label for="edit-post-id" class="col-form-label"></label>
                        <input type="text" name="edit-post-id" class="form-control" id="edit-post-id">
                    </div>
                    <div class="form-group">
                        <label for="edit-post-title" class="col-form-label">標題:</label>
                        <input type="text" name="edit-post-title" class="form-control" id="edit-post-title">
                    </div>
                    <div class="form-group">
                        <label for="edit-post-course" class="col-form-label">課程資訊:</label>
                        <textarea class="form-control" id="edit-post-course" name="edit-post-course"></textarea>
                        <label for="edit-post-team-ability" class="col-form-label">隊友條件:</label>
                        <textarea class="form-control" id="edit-post-team-ability" name="edit-post-team-ability"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn button_color" id="delete" value="delete">Delete</button>
                        <button type="button" class="btn button_color" id="save" value="save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>