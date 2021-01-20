
                <div class="modal-body">
                        @csrf
                        <input type="hidden" class="hidden" name="id" value="{{$metadata->id}}">
                                   
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title" value="{{$metadata->meta_title}}" placeholder="Meta Title" required>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Page URL</label>
                                    <input type="text" class="form-control" name="page_url" value="{{$metadata->page_url}}" placeholder="Page URL" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Meta Keywords</label>
                                    <textarea class="form-control summernote-dynamic" name="meta_keywords" placeholder="Meta Keywords" rows="5" required>{{$metadata->meta_keywords}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Meta Description</label>
                                    <textarea class="form-control summernote-dynamic" name="meta_description" placeholder="Meta Description" rows="5" required>{{$metadata->meta_description}}</textarea>
                                </div>
                            </div>
                        </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                <script type="text/javascript">
                  croppify();
                </script>
