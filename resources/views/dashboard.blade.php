@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-6 col-xl-6">
      <div class="card bg-light-primary shadow-none">
        <div class="card-body p-4">
          <div class="d-flex align-items-center">
            <div class="round rounded bg-primary d-flex align-items-center justify-content-center">
               <svg xmlns="http://www.w3.org/2000/svg" width="30" height="32" viewBox="0 0 24 24"><g fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M22 9L12 5L2 9l10 4l10-4v6"/><path d="M6 10.6V16a6 3 0 0 0 12 0v-5.4"/></g></svg>
            </div>
            <h6 class="mb-0 ms-3 fw-bold fs-6 fw-bold fs-6">Sekolah Yang Terdaftar</h6>
            <div class="ms-auto text-primary d-flex align-items-center">
                
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between mt-4">
            <span class="mb-0 fw-semibold fs-7">314</span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-6">
      <div class="card bg-light-danger shadow-none">
        <div class="card-body p-4">
          <div class="d-flex align-items-center">
            <div class="round rounded bg-danger d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="32" viewBox="0 0 24 24"><g fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="m7 16.5l-5-3l5-3l5 3V19l-5 3z"/><path d="M2 13.5V19l5 3m0-5.455l5-3.03m5 2.985l-5-3l5-3l5 3V19l-5 3zM12 19l5 3m0-5.5l5-3m-10 0V8L7 5l5-3l5 3v5.5M7 5.03v5.455M12 8l5-3"/></g></svg>
            </div>
            <h6 class="mb-0 ms-3 fw-bold fs-6">Paket Yang Ada</h6>
            <div class="ms-auto text-danger d-flex align-items-center">
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between mt-4">
            <span class="mb-0 fw-semibold fs-7">60</span>
          </div>
        </div>
      </div>
    </div>
   
  </div>
@endsection