@include('admin.layout.panels.customizer')
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<footer class="footer footer-static footer-light {{request()->cookie('footer_type') == 'footer-hidden' ? 'd-none' : ''}} {{request()->cookie('footer_type') == 'footer-static' ? 'footer-static' : ''}} ">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2019<a
                class="text-bold-800 grey darken-2" href="http://developer-vector.website" target="_blank">Vector</a>All rights Reserved</span><span
            class="float-md-right d-none d-md-block"> Made with Vector<i class="feather icon-heart pink"></i></span>
        <button class="btn btn-primary btn-icon scroll-top  {{request()->cookie('scroll_top') == 'enabled' ? 'd-none' : ''}}" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
@include('admin.layout.scripts')


