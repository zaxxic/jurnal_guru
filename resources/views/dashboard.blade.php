@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('assets/dist/css/flatpickr.min.css') }}">
@section('content')
<!-- <div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Jurnal Guru</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="index-2.html">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Jurnal Guru</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card rounded-2 overflow-hidden hover-img">
            <div class="position-relative">
                <a href="javascript:void(0)"><img src="dist/images/blog/blog-img6.jpg" class="card-img-top rounded-0" alt="..."></a>
                <span class="badge bg-white text-dark fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2 min Read</span>
                <img src="dist/images/profile/user-1.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Addie Keller">
            </div>
            <div class="card-body p-4">
                <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Gadget</span>
                <a class="d-block my-4 fs-5 text-dark fw-semibold" href="#">As yen tumbles, gadget-loving Japan goes for secondhand iPhones</a>
                <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>9,125</div>
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>3</div>
                    <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Mon, Jan 16</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card rounded-2 overflow-hidden hover-img">
            <div class="position-relative">
                <a href="javascript:void(0)"><img src="../../dist/images/blog/blog-img11.jpg" class="card-img-top rounded-0" alt="..."></a>
                <span class="badge bg-white text-dark fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2 min Read</span>
                <img src="../../dist/images/profile/user-2.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Walter Palmer">
            </div>
            <div class="card-body p-4">
                <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Social</span>
                <a class="d-block my-4 fs-5 text-dark fw-semibold" href="#">Intel loses bid to revive antitrust case against patent foe Fortress</a>
                <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>4,150</div>
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>38</div>
                    <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Sun, Jan 15</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card rounded-2 overflow-hidden hover-img">
            <div class="position-relative">
                <a href="javascript:void(0)"><img src="../../dist/images/blog/blog-img8.jpg" class="card-img-top rounded-0" alt="..."></a>
                <span class="badge bg-white text-dark fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2 min Read</span>
                <img src="../../dist/images/profile/user-3.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Miguel Kennedy">
            </div>
            <div class="card-body p-4">
                <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Health</span>
                <a class="d-block my-4 fs-5 text-dark fw-semibold" href="#">COVID outbreak deepens as more lockdowns loom in China</a>
                <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>9,480</div>
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>12</div>
                    <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Sat, Jan 14</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card rounded-2 overflow-hidden hover-img">
            <div class="position-relative">
                <a href="javascript:void(0)"><img src="../../dist/images/blog/blog-img5.jpg" class="card-img-top rounded-0" alt="..."></a>
                <span class="badge bg-white text-dark fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2 min Read</span>
                <img src="../../dist/images/profile/user-5.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Esther Lindsey">
            </div>
            <div class="card-body p-4">
                <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Lifestyle</span>
                <a class="d-block my-4 fs-5 text-dark fw-semibold" href="#">Streaming video way before it was cool, go dark tomorrow</a>
                <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>2252</div>
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>3</div>
                    <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Sat, Jan 14</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card rounded-2 overflow-hidden hover-img">
            <div class="position-relative">
                <a href="javascript:void(0)"><img src="../../dist/images/blog/blog-img3.jpg" class="card-img-top rounded-0" alt="..."></a>
                <span class="badge bg-white text-dark fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2 min Read</span>
                <img src="../../dist/images/profile/user-3.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Leroy Greer">
            </div>
            <div class="card-body p-4">
                <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Design</span>
                <a class="d-block my-4 fs-5 text-dark fw-semibold" href="#">Apple is apparently working on a new ‘streamlined’ accessibility for iOS</a>
                <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>5860</div>
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>38</div>
                    <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Fri, Jan 13</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card rounded-2 overflow-hidden hover-img">
            <div class="position-relative">
                <a href="javascript:void(0)"><img src="../../dist/images/blog/blog-img2.jpg" class="card-img-top rounded-0" alt="..."></a>
                <span class="badge bg-white text-dark fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2 min Read</span>
                <img src="../../dist/images/profile/user-2.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tommy Butler">
            </div>
            <div class="card-body p-4">
                <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Lifestyle</span>
                <a class="d-block my-4 fs-5 text-dark fw-semibold" href="#">After Twitter Staff Cuts, Survivors Face ‘Radio Silence</a>
                <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>6315</div>
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>12</div>
                    <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Wed, Jan 11</div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Jurnal Guru</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="index-2.html">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Jurnal Guru</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="card rounded-2 overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="../../dist/images/blog/blog-img6.jpg" class="card-img-top rounded-0" alt="..."></a>

                </div>
                <div class="card-body p-4">
                    <a class="d-block my-4 fs-5 text-dark fw-semibold" href="#">Bahasa Indonesia</a>
                    <div class="d-flex align-items-center gap-4">
                        <button class="btn me-1 mb-1 btn-light-warning text-warning btn-lg px-4 fs-4 font-medium" data-bs-toggle="modal" data-bs-target="#bs-example-modal-xlg">
                            Extra Large Modal
                        </button>
                        <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Mon, Jan 16</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card rounded-2 overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="../../dist/images/blog/blog-img11.jpg" class="card-img-top rounded-0" alt="..."></a>
                    <span class="badge bg-white text-dark fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2 min Read</span>
                    <img src="../../dist/images/profile/user-2.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Walter Palmer">
                </div>
                <div class="card-body p-4">
                    <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Social</span>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold" href="#">Intel loses bid to revive antitrust case against patent foe Fortress</a>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>4,150</div>
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>38</div>
                        <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Sun, Jan 15</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card rounded-2 overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="../../dist/images/blog/blog-img8.jpg" class="card-img-top rounded-0" alt="..."></a>
                    <span class="badge bg-white text-dark fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2 min Read</span>
                    <img src="../../dist/images/profile/user-3.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Miguel Kennedy">
                </div>
                <div class="card-body p-4">
                    <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Health</span>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold" href="#">COVID outbreak deepens as more lockdowns loom in China</a>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>9,480</div>
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>12</div>
                        <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Sat, Jan 14</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card rounded-2 overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="../../dist/images/blog/blog-img5.jpg" class="card-img-top rounded-0" alt="..."></a>
                    <span class="badge bg-white text-dark fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2 min Read</span>
                    <img src="../../dist/images/profile/user-5.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Esther Lindsey">
                </div>
                <div class="card-body p-4">
                    <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Lifestyle</span>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold" href="#">Streaming video way before it was cool, go dark tomorrow</a>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>2252</div>
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>3</div>
                        <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Sat, Jan 14</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card rounded-2 overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="../../dist/images/blog/blog-img3.jpg" class="card-img-top rounded-0" alt="..."></a>
                    <span class="badge bg-white text-dark fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2 min Read</span>
                    <img src="../../dist/images/profile/user-3.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Leroy Greer">
                </div>
                <div class="card-body p-4">
                    <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Design</span>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold" href="#">Apple is apparently working on a new ‘streamlined’ accessibility for iOS</a>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>5860</div>
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>38</div>
                        <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Fri, Jan 13</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card rounded-2 overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="../../dist/images/blog/blog-img2.jpg" class="card-img-top rounded-0" alt="..."></a>
                    <span class="badge bg-white text-dark fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2 min Read</span>
                    <img src="../../dist/images/profile/user-2.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tommy Butler">
                </div>
                <div class="card-body p-4">
                    <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Lifestyle</span>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold" href="#">After Twitter Staff Cuts, Survivors Face ‘Radio Silence</a>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>6315</div>
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>12</div>
                        <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Wed, Jan 11</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card rounded-2 overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="../../dist/images/blog/blog-img4.jpg" class="card-img-top rounded-0" alt="..."></a>
                    <span class="badge bg-white text-dark fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2 min Read</span>
                    <img src="../../dist/images/profile/user-4.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Donald Holmes">
                </div>
                <div class="card-body p-4">
                    <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Design</span>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold" href="#">Why Figma is selling to Adobe for $20 billion</a>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>7570</div>
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>38</div>
                        <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Wed, Jan 11</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card rounded-2 overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="../../dist/images/blog/blog-img1.jpg" class="card-img-top rounded-0" alt="..."></a>
                    <span class="badge bg-white text-dark fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2 min Read</span>
                    <img src="../../dist/images/profile/user-1.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Eric Douglas">
                </div>
                <div class="card-body p-4">
                    <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Gadget</span>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold" href="#">Garmins Instinct Crossover is a rugged hybrid smartwatch</a>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>6763</div>
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>12</div>
                        <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Tue, Jan 10</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="...">
        <ul class="pagination justify-content-center mb-0 mt-4">
            <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center" href="#"><i class="ti ti-chevron-left"></i></a>
            </li>
            <li class="page-item active" aria-current="page">
                <a class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center" href="#">1</a>
            </li>
            <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">2</a>
            </li>
            <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">3</a>
            </li>
            <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">4</a>
            </li>
            <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">5</a>
            </li>
            <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">...</a>
            </li>
            <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">10</a>
            </li>
            <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center" href="#"><i class="ti ti-chevron-right"></i></a>
            </li>
        </ul>
    </nav>
</div>
<!-- sample modal content -->
<div class="modal fade" id="bs-example-modal-xlg" tabindex="-1" aria-labelledby="bs-example-modal-lg" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Extra Large modal
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>
                    Overflowing text to show scroll behavior
                </h4>
                <p>
                    Praesent commodo cursus magna, vel scelerisque
                    nisl consectetur et. Vivamus sagittis lacus
                    vel augue laoreet rutrum faucibus dolor
                    auctor.
                </p>
                <p>
                    Aenean lacinia bibendum nulla sed consectetur.
                    Praesent commodo cursus magna, vel scelerisque
                    nisl consectetur et. Donec sed odio dui. Donec
                    ullamcorper nulla non metus auctor fringilla.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect text-start" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection