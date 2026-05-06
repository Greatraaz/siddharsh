@extends('admin.layouts.app')

@section('title', 'General Settings |')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">General Settings</h3>
            <p class="text-muted mb-0">Manage global site configurations, contact details, and social links.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">
            <ul class="nav nav-tabs px-4 pt-3 border-bottom-0" id="settingsTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active fw-bold px-4" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab">General</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold px-4" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab">Contact Info</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold px-4" id="social-tab" data-bs-toggle="tab" data-bs-target="#social" type="button" role="tab">Social Media</button>
                </li>
            </ul>

            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="tab-content p-4" id="settingsTabContent">
                    {{-- General Tab --}}
                    <div class="tab-pane fade show active" id="general" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">Site Title</label>
                                <input type="text" name="site_title" class="form-control @error('site_title') is-invalid @enderror" value="{{ old('site_title', $setting->site_title) }}">
                                @error('site_title') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">Admin Email (For Notifications)</label>
                                <input type="email" name="admin_email" class="form-control @error('admin_email') is-invalid @enderror" value="{{ old('admin_email', $setting->admin_email) }}">
                                @error('admin_email') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-4">
                                <label class="form-label fw-bold">Site Description</label>
                                <textarea name="site_description" class="form-control @error('site_description') is-invalid @enderror" rows="3">{{ old('site_description', $setting->site_description) }}</textarea>
                                @error('site_description') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">Logo</label>
                                @if($setting->logo)
                                    <div class="mb-3">
                                        <img src="{{ asset('uploads/settings/'.$setting->logo) }}" alt="Logo" class="rounded shadow-sm" style="max-height: 80px; max-width: 100%; background: #f8fafc; padding: 10px; border: 1px solid #e2e8f0;">
                                    </div>
                                @endif
                                <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" accept="image/*">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">Favicon</label>
                                @if($setting->favicon)
                                    <div class="mb-3">
                                        <img src="{{ asset('uploads/settings/'.$setting->favicon) }}" alt="Favicon" class="rounded shadow-sm" style="max-height: 48px; max-width: 48px; background: #f8fafc; padding: 5px; border: 1px solid #e2e8f0;">
                                    </div>
                                @endif
                                <input type="file" name="favicon" class="form-control @error('favicon') is-invalid @enderror" accept="image/*">
                            </div>
                        </div>
                    </div>

                    {{-- Contact Tab --}}
                    <div class="tab-pane fade" id="contact" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">Public Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $setting->email) }}">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">Public Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone', $setting->phone) }}">
                            </div>
                            <div class="col-md-12 mb-4">
                                <label class="form-label fw-bold">Office Address</label>
                                <textarea name="address" class="form-control" rows="3">{{ old('address', $setting->address) }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Social Tab --}}
                    <div class="tab-pane fade" id="social" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold"><i class="fab fa-facebook me-2 text-primary"></i> Facebook URL</label>
                                <input type="url" name="facebook" class="form-control" value="{{ old('facebook', $setting->facebook) }}" placeholder="https://facebook.com/yourpage">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold"><i class="fab fa-twitter me-2 text-info"></i> Twitter URL</label>
                                <input type="url" name="twitter" class="form-control" value="{{ old('twitter', $setting->twitter) }}" placeholder="https://twitter.com/yourhandle">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold"><i class="fab fa-instagram me-2 text-danger"></i> Instagram URL</label>
                                <input type="url" name="instagram" class="form-control" value="{{ old('instagram', $setting->instagram) }}" placeholder="https://instagram.com/yourprofile">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold"><i class="fab fa-linkedin me-2 text-primary"></i> LinkedIn URL</label>
                                <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin', $setting->linkedin) }}" placeholder="https://linkedin.com/company/yourpage">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold"><i class="fab fa-youtube me-2 text-danger"></i> YouTube URL</label>
                                <input type="url" name="youtube" class="form-control" value="{{ old('youtube', $setting->youtube) }}" placeholder="https://youtube.com/c/yourchannel">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-4 border-top">
                    <button type="submit" class="btn btn-primary px-5 py-2 fw-bold">
                        <i class="fa-solid fa-save me-2"></i> Save All Settings
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection

@push('styles')
<style>
    .nav-tabs .nav-link { border: none; color: #64748b; padding: 1rem 0; margin-right: 2rem; border-bottom: 2px solid transparent; }
    .nav-tabs .nav-link:hover { color: var(--primary); }
    .nav-tabs .nav-link.active { color: var(--primary); border-bottom-color: var(--primary); background: transparent; }
</style>
@endpush
