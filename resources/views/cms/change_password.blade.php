<div class="mws-panel grid_5">
    <div class="mws-panel-header">
        <span style="float: left;"><i class="icon-lock"></i>Change password</i></span>
    </div>
    <div class="mws-panel-body">
    <form name="password_form" id="password_form">
        <div class="mws-form-item" style="margin-bottom: 8px;">
            <input type="password" class="large" name="old_password" id="old_password" placeholder="Old password">
        </div>
        <div class="mws-form-item" style="margin-bottom: 8px;">
            <input type="password" class="large" name="new_password" id="new_password" placeholder="New password">
        </div>
        <div class="mws-form-item" style="margin-bottom: 8px;">
            <input type="password" class="large" name="confirm_password" id="confirm_password" placeholder="Confirm new password">
        </div>
        <div class="mws-button-row" style="margin-top: 24px;">
            <button type="button" class="btn btn-info btn-small" onclick="change_password()">Change password</button>
        </div>
    </form>
    <div style="margin-top: 24px; color: green; font-size: 1.5em; min-height: 20px;" id="status">
    </div>
    </div>
</div>