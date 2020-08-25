<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
  <div class="template-upload statbox widget box box-shadow rounded mt-2 mb-1">
                         <div class="widget-content widget-content-area rounded p-1">
                         <div class="d-flex flex-md-row flex-column align-items-center justify-content-between">
                           <div class="col-sm-2 col-3">
        <span class="preview"></span>
        </div>
         <div class="col-lg-3 col-md-4 col-sm-4 col-8 text-left">
        {% if (window.innerWidth > 480 || !o.options.loadImageFileTypes.test(file.type)) { %}
        <label>عنوان :</label>
        <input type="text" name="file_title[]" class="form-control form-control-sm py-0" value="{%=file.name%}" required>
        {% } %}
        <strong class="error text-danger"></strong>
        </div>
         <div class="col-lg-3 col-md-4 col-sm-4 col-8 text-left">
        {% if (window.innerWidth > 480 || !o.options.loadImageFileTypes.test(file.type)) { %}
        <label>تاریخ :</label>
        <input type="text" name="file_created_at[]" class="form-control form-control-sm py-0" autocomplete-"off" required>
        {% } %}
        <strong class="error text-danger"></strong>
        </div>
          <div class="col-lg-2 col-md-3 col-sm-4 col-8 text-left">
        <div class="size mb-2 text-light">Processing...</div>
        <div class="progress active my-md-0 my-2" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:0%;float:right !important;"></div></div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-2 col-4 text-center d-flex flex-wrap flex-md-row flex-sm-column-reverse flex-row justify-content-center align-items-center">
{% if (!o.options.autoUpload && o.options.edit && o.options.loadImageFileTypes.test(file.type)) { %}
        <button class="btn btn-success edit" data-index="{%=i%}" disabled>
        <i class="glyphicon glyphicon-edit"></i>
        <span>Edit</span>
        </button>
        {% } %}
        {% if (!i) { %}
        <button class="btn btn-outline-warning cancel my-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-slash"><circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line></svg>
        {{--<span>کنسل</span>--}}
        </button>
        {% } %}
        {% if (!i && !o.options.autoUpload) { %}
        <button class="btn btn-outline-primary start my-1" disabled>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path><polyline points="16 6 12 2 8 6"></polyline><line x1="12" y1="2" x2="12" y2="15"></line></svg>
        {{--<span>آپلود</span>--}}
        </button>
        {% } %}
        </div>
                         </div>
        </div>
        </div>
        {% } %}
</script>