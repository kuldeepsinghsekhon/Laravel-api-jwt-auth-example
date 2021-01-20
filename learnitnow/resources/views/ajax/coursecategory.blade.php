                    <div class="modal-body">
                        <p>Update category name.</p>
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Category Banner Image</label>
                                    @if( !empty($category->image) )
                                    <input type="file" name="image" class="croppie" default="{{ asset('uploads/category/'.$category->image) }}" crop-width="1366" crop-height="319" accept="image/*">
                                
                                    @else
                                    <input type="file" name="image" class="croppie" crop-width="1366" crop-height="319" accept="image/*">
                                    @endif
                                </div> 
                            </div>   
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Category Thumbnail Image</label>
                                    @if( !empty($category->thumbnail) )
                                    <input type="file" name="thumbnail" class="croppie" default="{{ asset('uploads/category/thumbnail/'.$category->thumbnail) }}" crop-width="385" crop-height="175" accept="image/*">
                                
                                    @else
                                    <input type="file" name="thumbnail" class="croppie" crop-width="385" crop-height="175" accept="image/*">
                                    @endif
                                </div> 
                            </div>   
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Category name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $category->name }}" placeholder="Category name" required>
                                    <input type="hidden" name="categoryid" value="{{ $category->id }}" />
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