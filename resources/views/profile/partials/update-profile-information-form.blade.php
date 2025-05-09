<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h4 class="card-title">{{ __('Profil Bilgileri') }}</h4>
                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Hesabınızın profil bilgilerini ve e-posta adresinizi güncelleyin.') }}
                </p>
            </div><!--end col-->
        </div> <!--end row-->
    </div><!--end card-header-->
    <div class="card-body pt-0">

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')


            <div class="form-group mb-3 row">
                <x-input-label for="name" :value="__('İsim')"
                    class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label" />
                <div class="col-lg-9 col-xl-8">
                    <x-text-input id="name" name="name" type="text" class="form-control mt-1 block w-full"
                        :value="old('name', $user->name)" required autofocus autocomplete="name" />
                </div>
                <x-input-error class="mt-2 text-danger" :messages="$errors->get('name')" />
            </div>


            <div class="form-group mb-3 row">
                <x-input-label for="email" :value="__('E-posta')"
                    class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label" />
                <div class="col-lg-9 col-xl-8">
                    <x-text-input id="email" name="email" type="email" class="form-control mt-1 block w-full"
                        :value="old('email', $user->email)" required autocomplete="username" />
                </div>
                <x-input-error class="mt-2 text-danger" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div class="mt-2 text-end">
                        <p class="text-sm text-gray-800 mb-1">
                            {{ __('E-posta adresiniz doğrulanmamış.') }}
                        </p>
                        <button form="send-verification"
                            class="btn btn-link p-0 m-0 align-baseline text-decoration-none">
                            {{ __('Doğrulama e-postasını yeniden göndermek için buraya tıklayın.') }}
                        </button>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-success">
                                {{ __('Yeni bir doğrulama bağlantısı e-posta adresinize gönderildi.') }}
                            </p>
                        @endif
                    </div>
                @endif
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
