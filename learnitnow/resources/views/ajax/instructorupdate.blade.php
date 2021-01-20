<div class="modal-body">
    @csrf
    <p>Fill the form below to create a New Instructor.</p>
            <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label>Instructor Image</label>
                 
                    @if( !empty($datapage->image) )
                  <input type="file" name="image" class="croppie" default="{{ asset('uploads/instructor/'.$datapage->image) }}" crop-width="200" crop-height="200" accept="image/*">
                  @else
                  <input type="file" name="image" class="croppie" crop-width="90" crop-height="90" accept="image/*">
                  @endif
                </div> 
               
        
            </div>
                 
        </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="name" value="{{ $datapage->name }}"required>
              <input type="hidden" name="id" value="{{ $datapage->id }}" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <label>Title</label>
                <input type="text" class="form-control" name="title" placeholder="Title"  value="{{ $datapage->title }}"required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <label>Email</label>

                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $datapage->email }}" required>

            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <label> City</label>
                <input type="text" class="form-control" name="city" placeholder="City"  value="{{ $datapage->city }}"required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <label>State</label>
                <input type="text" class="form-control" name="state" placeholder="State" value="{{ $datapage->state }}" required>
            </div>
        </div>
    </div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save </button>
</div>

 <script type="text/javascript">
                        croppify();
                    </script>