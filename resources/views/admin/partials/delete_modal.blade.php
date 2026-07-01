{{-- Reusable delete confirmation popup. Include once per page (in layout). --}}
<div class="modal-overlay" id="deleteModal">
    <div class="modal-box">
        <div class="modal-body">
            <div class="modal-icon">!</div>
            <h3>Delete this item?</h3>
            <p>This action cannot be undone. The record will be permanently removed.</p>
        </div>
        <div class="modal-actions">
            <button type="button" class="btn btn-outline" onclick="closeDeleteModal()">Cancel</button>
            <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
        </div>
    </div>
</div>

<script>
    let deleteFormTarget = null;

    function openDeleteModal(form) {
        deleteFormTarget = form;
        document.getElementById('deleteModal').classList.add('open');
    }

    function closeDeleteModal() {
        deleteFormTarget = null;
        document.getElementById('deleteModal').classList.remove('open');
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
            if (deleteFormTarget) deleteFormTarget.submit();
        });

        document.getElementById('deleteModal').addEventListener('click', function (e) {
            if (e.target === this) closeDeleteModal();
        });

        document.querySelectorAll('form.delete-form').forEach(function (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                openDeleteModal(form);
            });
        });
    });
</script>
