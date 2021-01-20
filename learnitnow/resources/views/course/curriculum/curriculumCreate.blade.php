<form action='certify/curriculumSave' id='create_curriculum' enctype ='multipart/form-data'>

<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            <label class="form-control-label">Chapter Name</label>
            <input type="text" class="form-control" name="title" placeholder="Chapter Name" required>
            <input type="hidden" name="certify_id" value="{{$id}}">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            <label class="form-control-label">Certify Description</label>
            <textarea class="form-control" id="summary-ckeditor" name="description" placeholder="Certify Description" rows="5"
              required></textarea>
        </div>
    </div>
</div>
<div class="text-right">
    <button type="submit" class ='btn btn-sm btn-primary rounded-pill'>Save</button>
    <button type="button" class="btn btn-sm btn-secondary rounded-pill" data-dismiss="modal">{{__('Cancel')}}</button>
</div>
</form>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
</script>