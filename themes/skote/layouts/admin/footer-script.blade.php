<!-- JAVASCRIPT -->
<script src="{{ theme_url('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{ theme_url('assets/libs/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ theme_url('assets/libs/metismenu/metismenu.min.js')}}"></script>
<script src="{{ theme_url('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ theme_url('assets/libs/node-waves/node-waves.min.js')}}"></script>
<script src="{{ theme_url('assets/libs/tinymce/tinymce.min.js')}}"></script>
<script src="{{ theme_url('assets/libs/summernote/summernote.min.js')}}"></script>
<script src="{{ theme_url('assets/js/pages/form-editor.init.js')}}"></script>
@yield('script')

<!-- App js -->
<script src="{{ theme_url('assets/js/app.min.js')}}"></script>

@yield('script-bottom')
@stack('script-extra')
