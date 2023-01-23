<div class="modal fade media-modal" id="mediaModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="mb-0 text-dark">Choose Photo</h3>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal"><span
                        class="lnr lnr-cross"></span></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active select_image" data-bs-toggle="tab"
                            data-bs-target="#select">{{ __('static.media.select_file') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link upload-image" data-bs-toggle="tab"
                            data-bs-target="#upload">{{ __('static.media.upload_new') }}</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="select">
                        <div class="select-top-panel">
                            <div class="row gx-sm-4 gx-2 align-items-center">
                                <div class="col-lg-8 col-sm-4 col-6 ml-auto">
                                    <input type="text" id="search-image"
                                        class="form-control search-input search-image" placeholder="Search your files">
                                </div>
                                <div class="col-lg-4 col-sm-4 col-6">
                                    <select class="form-select" id="sortby-image">
                                        <option value="">Select filter</option>
                                        <option value="newest">{{ __('static.media.sort_by_newest') }}</option>
                                        <option value="oldest">{{ __('static.media.sort_by_oldest') }}</option>
                                        <option value="smallest">{{ __('static.media.sort_by_smallest') }}</option>
                                        <option value="largest">{{ __('static.media.sort_by_largest') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="content-section ratio2_3">
                            <div class="row margin-default">
                                <div class="row upload-card media-files">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="upload">
                        {!! Form::open([
                            'route' => 'admin.media.store',
                            'method' => 'POST',
                            'class' => 'dropzone digits',
                            'files' => true,
                        ]) !!}
                        <div class="dz-message needsclick">
                            <i class="fa fa-cloud-upload"></i>
                            <h4 class="mb-0 f-w-600">{{ __('static.media.drop_message') }}</h4>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="left-part">
                    <div class="file-detail">
                        <h6 class="selected-count">{{ __('static.media.0_file_selected') }}</h6>
                        <button class="btn btn-sm btn-primary font-red clear">Clear</button>
                    </div>
                </div>
                <div class="right-part">
                    <a href="#" class="btn btn-solid select-media btn-add"
                        data-bs-dismiss="modal">{{ __('static.media.add') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
