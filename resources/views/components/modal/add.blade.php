<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addUserModalLabel"> Add New User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <x-form.input-text name="name" />
                    <x-form.input-email name="email" />
                    <x-form.input-password name="password" />
                    <x-form.input-checkbox name="reset" />
                    <x-form.button-submit />
                </form>
            </div>
        </div>
    </div>
</div>