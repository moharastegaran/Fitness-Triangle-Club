<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
 <div class="template-download statbox widget box box-shadow rounded mt-2 mb-1">
                         <div class="widget-content widget-content-area rounded p-1">
                         <div class="d-flex flex-md-row flex-wrap align-items-center justify-content-between">
    <div class="col-md-2 col-sm-4 text-center text-sm-left">
  <span class="preview">
  {% if (file.thumbnailUrl) { %}
  <a class="fullscreen" href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}">
  {% if (file.isPhoto) { %}
  <img src="{%=file.thumbnailUrl%}" style="max-width:80px;max-height:80px">
  {% } else { %}
  <video width="110" height="110" controls>
  <source src="{%=file.thumbnailUrl%}">
  </video>
  {% } %}
  </a>
  {% } %}
  </span>
  </div>
  <div class="file-desc col-md-6 col-sm-6 col-12 mx-auto d-flex flex-md-row-reverse flex-column-reverse align-items-center">
    <div class="col-md-4 col-12 text-md-left text-center text-light mt-md-0 mt-3">
    <span class="size" dir="rtl">{%=o.formatFileSize(file.size)%}</span>
    </div>
  <div class="col-md-8 col-12 text-md-left text-center mt-sm-0 mt-3">
  {% if (window.innerWidth > 480 || !file.thumbnailUrl) { %}
  <p class="name w-100 mb-md-2 mb-0">
  {% if (file.url) { %}


  <a class="fullscreen" href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}">{%=file.name%}</a>
  {% } else { %}
  <span>{%=file.name%}</span>
  {% } %}
  </p>
  {% } %}
  {% if (file.error) { %}
  <div><span class="label label-danger">خطا</span> {%=file.error%}</div>
  {% } %}
  </div>
{{--<div class="col-md-1"></div>--}}
    </div>
    {{--</div>--}}

    <div class="col-md-4 col-sm-2 col-12 text-center d-flex flex-wrap flex-md-row flex-sm-column-reverse flex-row justify-content-center align-items-center">
{% if (file.deleteUrl) { %}
{{--<input type="checkbox" class="toggle ml-md-3" value="1" name="delete">--}}
    <button class="btn btn-outline-danger delete mr-md-1 mr-sm-0 mr-1" data-type="DELETE" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
    <i class="fas fa-trash-alt">
     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                             class="feather feather-trash-2">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg>
    </i>
    <span>حذف</span>
    </button>
    <button class="btn btn-outline-success my-1 update" data-type="PUT" data-url="{%=file.updateUrl%}">
    <input type="hidden" value="0">
    <i class="fas fa-edit">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                             class="feather feather-edit-2">
                                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                        </svg>
    </i>
    <span>ویرایش</span>
    </button>
        {% } else { %}
        <button class="btn btn-warning cancel">
         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-slash"><circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line></svg>
        <span>کنسل</span>
        </button>
        {% } %}
        </div>
        </div>
        </div>
        </div>
        </div>
        {% } %}

</script>