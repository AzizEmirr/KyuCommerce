<!-- Hesabı Sil Kartı -->
<div class="card shadow-lg border-light mb-4">
    <div class="card-header bg-danger text-white">
        <h4 class="card-title mb-0">{{ __('Hesabı Sil') }}</h4>
    </div>
    <div class="card-body">
        <p class="text-muted">
            {{ __('Hesabınız silindiğinde, tüm kaynaklar ve veriler kalıcı olarak silinecektir. Hesabınızı silmeden önce, saklamak istediğiniz verileri veya bilgileri indiriniz.') }}
        </p>
        <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
            {{ __('Hesabı Sil') }}
        </button>
    </div>
</div>

<!-- Silme Onay Modalı -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">Hesabı Sil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="mb-3">
                    {{ __('Hesabınızı silmek istediğinizden emin misiniz?') }}
                </h5>
                <p class="text-muted">
                    {{ __('Hesabınızı kalıcı olarak silmek istediğinizi onaylamak için lütfen şifrenizi girin.') }}
                </p>
                <form id="deleteAccountForm" method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Şifre') }}</label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('Şifrenizi girin') }}" required />
                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">İptal</button>
                <button type="submit" class="btn btn-outline-danger" form="deleteAccountForm">{{ __('Hesabı Sil') }}</button>
            </div>
        </div>
    </div>
</div>
