@extends('layouts.master')
@section('content')
    <div class="d-flex flex-row-fluid bgi-size-cover bgi-position-top" style="background-image: url('assets/media/bg/bg-9.jpg')">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center pt-25 pb-35">
                <h3 class="font-weight-bolder text-dark mb-0">Acerca De</h3>
            </div>
        </div>
    </div>


    
    <div class="container mt-n15">
        <div class="card mb-8">
            <div class="card-body p-10">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tab-content">
                            <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="faq">
                                <div class="card">
                                    <div class="card-header">
                                        <h2 class="card-title text-dark" style="cursor: auto;">
                                            <span class="svg-icon svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                        <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                                        <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                            <div class="card-label text-dark pl-4">Nosotros</div>
                                        </h2>
                                    </div>
                                    <div class="" style="">
                                        <div class="card-body text-dark-50 font-size-lg pl-12">Anim pariatur cliche reprehenderit, enim eiusmod Lorem ipsum dolor sit amet consectetur adipiscing, elit ultrices natoque eget dapibus tellus pulvinar, neque scelerisque fusce id dignissim. Pulvinar faucibus quisque commodo penatibus ridiculus habitasse vitae, pretium vestibulum ultrices litora mollis ultricies accumsan, mus bibendum convallis senectus ornare phasellus. Convallis duis lacus velit vitae mattis a ultricies imperdiet aliquam per, purus suspendisse feugiat accumsan senectus proin ultrices luctus sagittis, est potenti magnis eget varius magna sed vulputate blandit.
                                        <br><br>
                                        Tincidunt urna sagittis sem fusce facilisis pretium montes tellus lectus, fringilla ac aliquet dapibus aenean bibendum justo class enim phasellus, tempor velit neque nascetur nisl suscipit integer sodales. Dictumst hac duis dapibus malesuada sociis sed quis quam etiam nam, tellus porta nibh facilisis condimentum potenti semper mollis cum, bibendum varius mus per sodales montes morbi penatibus vehicula. Congue dapibus eu pharetra taciti et montes tristique consequat, mi neque ligula metus elementum volutpat porta mattis erat, a purus nisl mollis faucibus luctus auctor.</div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h2 class="card-title text-dark" style="cursor: auto;">
                                            <span class="svg-icon svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                        <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                                        <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                            <div class="card-label text-dark pl-4">Nuestra Empresa</div>
                                        </h2>
                                    </div>
                                    <div class="" style="">
                                        <div class="card-body text-dark-50 font-size-lg pl-12">Anim pariatur cliche reprehenderit, enim eiusmod Lorem ipsum dolor sit amet consectetur adipiscing, elit ultrices natoque eget dapibus tellus pulvinar, neque scelerisque fusce id dignissim. Pulvinar faucibus quisque commodo penatibus ridiculus habitasse vitae, pretium vestibulum ultrices litora mollis ultricies accumsan, mus bibendum convallis senectus ornare phasellus. Convallis duis lacus velit vitae mattis a ultricies imperdiet aliquam per, purus suspendisse feugiat accumsan senectus proin ultrices luctus sagittis, est potenti magnis eget varius magna sed vulputate blandit.
                                        <br><br>
                                        Tincidunt urna sagittis sem fusce facilisis pretium montes tellus lectus, fringilla ac aliquet dapibus aenean bibendum justo class enim phasellus, tempor velit neque nascetur nisl suscipit integer sodales. Dictumst hac duis dapibus malesuada sociis sed quis quam etiam nam, tellus porta nibh facilisis condimentum potenti semper mollis cum, bibendum varius mus per sodales montes morbi penatibus vehicula. Congue dapibus eu pharetra taciti et montes tristique consequat, mi neque ligula metus elementum volutpat porta mattis erat, a purus nisl mollis faucibus luctus auctor.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop