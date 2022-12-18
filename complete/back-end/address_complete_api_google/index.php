<!--FORM START -->
<h4>Slip No. <?= trim($row['serial_no'])?></span></h4>
<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Customer Name</label>
            <input type="text" name="name" class="form-control form-control-submit" value="<?= trim($row['name'])?>" placeholder="Enter Your Name" required readonly>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">User name</label>
            <input type="text" name="username" class="form-control form-control-submit" value="<?= trim($row['username'])?>" placeholder="Your Username" required readonly>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label class="text-light-black fw-600">Date</label>
            <input type="text" name="date" class="form-control" value="<?= trim($row['date'])?>" required readonly>
        </div>
    </div>
</div>
<hr>
<h4>Shirt Details</h4>
<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Length</label>
            <input type="text" name="shirt_length" class="form-control form-control-submit" value="<?= trim($row['shirt_length'])?>" placeholder="Length" required readonly>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Chest</label>
            <input type="text" name="shirt_chest" class="form-control form-control-submit" value="<?= trim($row['shirt_chest'])?>" placeholder="Chest" required readonly>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Stomach</label>
            <input type="text" name="shirt_stomach" class="form-control form-control-submit" value="<?= trim($row['shirt_stomach'])?>" placeholder="Stomach" required readonly>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Shoulder (Teera)</label>
            <input type="text" name="shirt_shoulder" class="form-control form-control-submit" value="<?= trim($row['shirt_shoulder'])?>" placeholder="Shoulder(Teera)" required readonly>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Sleeve(Half/Full)</label>
            <input type="text" name="shirt_sleeve" class="form-control form-control-submit" value="<?= trim($row['shirt_sleeve'])?>" placeholder="Sleeve(Half/Full)" required readonly>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Collar (Normal/Chinese)</label>
            <input type="text" name="shirt_collar" class="form-control form-control-submit" value="<?= trim($row['shirt_collar'])?>" placeholder="Collar (Normal/Chinese)" required readonly>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Arm Hole</label>
            <input type="text" name="shirt_arm_hole" class="form-control form-control-submit" value="<?= trim($row['shirt_arm_hole'])?>" placeholder="Arm Hole" required readonly>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Mori</label>
            <input type="text" name="shirt_mori" class="form-control form-control-submit" value="<?= trim($row['shirt_mori'])?>" placeholder="Mori" required readonly>
        </div>
    </div>



    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Biceps</label>
            <input type="text" name="shirt_biceps" class="form-control form-control-submit" value="<?= trim($row['shirt_biceps'])?>" placeholder="Biceps" required readonly>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Fabric</label>
            <input type="text" name="shirt_fabric" class="form-control form-control-submit" value="<?= trim($row['shirt_fabric'])?>" placeholder="Fabric" required readonly>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Color</label>
            <input type="text" name="shirt_color" class="form-control form-control-submit" value="<?= trim($row['shirt_color'])?>" placeholder="Color" required readonly>
        </div>
    </div>
    <div class="col-lg-12 col-md-12">
        <div class="form-group">
            <label class="text-light-black fw-600">Remarks</label>
            <textarea type="message" name="shirt_remarks" class="form-control form-control-submit" placeholder="Remarks" required readonly><?= trim($row['shirt_remarks'])?></textarea>
        </div>
    </div>
</div>

<hr>
<h4>Trouser Details</h4>
<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Length</label>
            <input type="text" name="trouser_length" class="form-control form-control-submit" value="<?= trim($row['trouser_length'])?>" placeholder="Length" required readonly>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Waist</label>
            <input type="text" name="trouser_waist" class="form-control form-control-submit" value="<?= trim($row['trouser_waist'])?>" placeholder="Waist" required readonly>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Hip</label>
            <input type="text" name="trouser_hip" class="form-control form-control-submit" value="<?= trim($row['trouser_hip'])?>" placeholder="Hip" required readonly>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Thigh</label>
            <input type="text" name="trouser_thigh" class="form-control form-control-submit" value="<?= trim($row['trouser_thigh'])?>" placeholder="Thigh" required readonly>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Knee</label>
            <input type="text" name="trouser_knee" class="form-control form-control-submit" value="<?= trim($row['trouser_knee'])?>" placeholder="Knee" required readonly>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Bottom</label>
            <input type="text" name="trouser_bottom" class="form-control form-control-submit" value="<?= trim($row['trouser_bottom'])?>" placeholder="Bottom" required readonly>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Aasan</label>
            <input type="text" name="trouser_aasan" class="form-control form-control-submit" value="<?= trim($row['trouser_aasan'])?>" placeholder="Aasan" required readonly>
        </div>
    </div>




    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Fabric</label>
            <input type="text" name="trouser_fabric" class="form-control form-control-submit" value="<?= trim($row['trouser_fabric'])?>" placeholder="Fabric" required readonly>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Color</label>
            <input type="text" name="trouser_color" class="form-control form-control-submit" value="<?= trim($row['trouser_color'])?>" placeholder="Color" required readonly>
        </div>
    </div>
    <div class="col-lg-12 col-md-12">
        <div class="form-group">
            <label class="text-light-black fw-600">Remarks</label>
            <textarea type="message" name="trouser_remarks" class="form-control form-control-submit" placeholder="Remarks" required readonly><?= trim($row['trouser_remarks'])?></textarea>
        </div>
    </div>
</div>


<hr>
<h4>Suit Details</h4>
<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Cross Back</label>
            <input type="text" name="suit_cross_back" class="form-control form-control-submit" value="<?= trim($row['suit_cross_back'])?>" placeholder="Cross Back" required readonly>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Back Cut (Side/Center)</label>
            <input type="text" name="suit_back_cut" class="form-control form-control-submit" value="<?= trim($row['suit_back_cut'])?>" placeholder="Back Cut (Side/Center)" required readonly>
        </div>
    </div>

    <div class="col-lg-6 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Fabric</label>
            <input type="text" name="suit_fabric" class="form-control form-control-submit" value="<?= trim($row['suit_fabric'])?>" placeholder="Fabric" required readonly>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="form-group">
            <label class="text-light-black fw-600">Color</label>
            <input type="text" name="suit_color" class="form-control form-control-submit" value="<?= trim($row['suit_color'])?>" placeholder="Color" required readonly>
        </div>
    </div>
    <div class="col-lg-12 col-md-12">
        <div class="form-group">
            <label class="text-light-black fw-600">Remarks</label>
            <textarea type="message" name="suit_remarks" class="form-control form-control-submit" placeholder="Remarks" required readonly><?= trim($row['suit_remarks'])?></textarea>
        </div>
    </div>
    <!--FORM END-->