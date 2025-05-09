<div class="card">
    <div class="card-header">
        <h4 class="card-title">Şifreyi Güncelle</h4>
        <p class="mt-1 text-sm text-gray-600">
            Hesabınızın güvenliğini sağlamak için uzun ve rastgele bir şifre kullandığınızdan emin olun.
        </p>
    </div><!--end card-header-->
    <div class="card-body pt-0">

        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')



            <div class="form-group mb-3 row">
                <x-input-label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label"
                    for="update_password_current_password" :value="__('Eski Şifre')" />
                <div class="col-lg-9 col-xl-8">
                    <x-text-input id="update_password_current_password" name="current_password" type="password"
                        class="form-control" autocomplete="current-password" placeholder="Eski Şifre" />
                    <a href="#" class="text-primary font-12"></a>
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>
            </div>

            <div class="form-group mb-3 row">
                <x-input-label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label"
                    for="update_password_password" :value="__('Yeni Şifre')" />
                <div class="col-lg-9 col-xl-8">
                    <x-text-input id="update_password_password" name="password" type="password" class="form-control"
                        autocomplete="new-password" placeholder="Yeni Şifre"  />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>
            </div>

            <div class="form-group mb-3 row">
                <x-input-label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label"
                    for="update_password_password_confirmation" :value="__('Şifreyi Doğrula')" />
                <div class="col-lg-9 col-xl-8">
                    <x-text-input id="update_password_password_confirmation" name="password_confirmation"
                        type="password" class="form-control" autocomplete="new-password" placeholder="Şifreyi Doğrula"  />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-9 col-xl-8 offset-lg-3">
                    <button class="btn btn-outline-primary">
                        {{ __('Kaydet') }}
                    </button>
                </div>
            </div>
            
        </form>
    </div><!--end card-body-->
</div><!--end card-->
