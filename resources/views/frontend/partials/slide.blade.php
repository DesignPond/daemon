@if(Request::is('/'))
    <!-- Page Info -->
    <div class="page-info page-info-background page-info-light background-5 helper center js-parallax">
        <div class="page-info-container">
            <div class="container ">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-title">Documentation</h1>
                        <h2 class="page-description">{!! Registry::get('nom', 'DesignPond') !!}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Info -->
@else
    <!-- Page Info -->
    <div class="page-info page-info-background header-background page-info-light background-5 helper center js-parallax"></div>
    <!-- End Page Info -->
@endif

