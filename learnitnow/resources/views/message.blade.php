@if(session('success'))
        <div class="row">
            <div class="col-sm-6 mx-auto mt-2">
                <div class="alert alert-success">
                    {!! session('success') !!}
                </div>
            </div>            
        </div>        
@endif

@if(session('error'))
    <div class="row">
        <div class="col-sm-6 mx-auto mt-2">
            <div class="alert alert-danger">
                {!! session('error') !!}
            </div>
        </div>    
    </div>            
@endif