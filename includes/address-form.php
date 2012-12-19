
<div class="control-group">
    <label class="control-label" for="address_line_1"><strong><?php echo ADDRESS_LINE_1; ?>: </strong></label>
    <div class="controls">
        <input type="text" id="address_line_1" name="address_line_1" placeholder="<?php echo ADDRESS_LINE_1; ?>">
        <span class="help-block"><?php echo ADDRESS_LINE_1_DESCRIPTION; ?></span>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="address_line_2"><strong><?php echo ADDRESS_LINE_2; ?>: </strong></label>
    <div class="controls">
        <input type="text" id="address_line_2" name="address_line_2" placeholder="<?php echo ADDRESS_LINE_2; ?>">
        <span class="help-block"><?php echo ADDRESS_LINE_2_DESCRIPTION; ?></span>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="city"><strong><?php echo CITY; ?>: </strong></label>
    <div class="controls">
        <input type="text" id="city" name="city" placeholder="<?php echo CITY; ?>">
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="province_state"><strong><?php echo STATE_PROVINCE_REGION; ?>: </strong></label>
    <div class="controls">
        <input type="text" id="province_state" name="province_state" placeholder="<?php echo STATE_PROVINCE_REGION; ?>">
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="postal_code"><strong><?php echo POSTAL_CODE; ?>: </strong></label>
    <div class="controls">
        <input type="text" id="postal_code" name="postal_code" placeholder="<?php echo POSTAL_CODE; ?>">
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="country"><strong><?php echo SELECT_COUNTRY; ?>: </strong></label>
    <div class="controls">
        <select name="country" id="country">
            <option value=''>--</option>
            <option value='SG'><?php echo SINGAPORE; ?></option>
            <option value='CN'><?php echo CHINA; ?></option>
        </select>
    </div>
</div>
