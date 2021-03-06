<?php
/**
 * 
 * @author FABteam
 * @version 0.0.1
 * @license https://opensource.org/licenses/GPL-3.0
 * 
 */
?>
<!-- LASER TAB -->
<div class="tab-pane fade in active" id="laser-tab">
	<div class="row margin-bottom-10" id="laser-upload-container">
		
		<div class="col-sm-12 margin-bottom-20" id="latest-upload-images-container">
			<h5 style="display:none;" id="laser-recent-files-title"><?php echo _("Latest uploaded files");?></h5>
			<div class="owl-carousel owl-theme" id="uplaoded-images"></div>
		</div>
		
		<div class="col-sm-12">
			<div id="laser-dropzone" class="dropzone"></div>
			<span class="pull-left margin-top-10"><?php echo str_replace("{0}", ($max_upload_file_size/1024)." MB", _("Note: max file size is {0}"));?></span>
			<button class="btn btn-primary pull-right margin-top-10 action-button" data-action="upload" data-type="laser" id="laser-upload"><i class="fa fa-upload"></i> <?php echo _("Upload");?></button>
		</div>
	</div>
	<div class="row" id="laser-slice-form-container">
		<div class="col-sm-4 hidden text-center" id="laser-image-container">
			<div class="row margin-bottom-10">
				<div class="col-sm-12">
					<button id="upload-new-file" class="btn btn-default pull-left"><i class="fa fa-plus"></i> <?php echo _("Upload new file");?></button>
				</div>
			</div>
			<div class="row  margin-bottom-10">
				<div class="col-sm-12">
					<div class="owl-carousel owl-theme" id="laser-preview-carousel">
						<div class="well well-light">
							<div>
    							<img class="img-responsive" id="laser-image-source" >
    							<span id="no-preview" class="font-md"><?php echo _('Preview not available for this file');?></span>
							</div>
						</div>
						<div class="well well-light"  style="overflow: auto; max-height: 550px;">
							<div>
								<img class="img-responsive laser-preview-source" id="laser-preview-source">
								<span id="no-gcode-alert" class="font-md"><?php echo _('Click on "Generate GCode" to show preview');?></span>
							</div>
							<div id="engraving-note" class="margin-bottom-10 hidden">
								<span class="note pull-left"><?php echo _("Note: black is being burned by the laser");?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-8 hidden" id="laser-slice-settings-container">
			<div class="row margin-bottom-10">
				<div class="col-sm-6 col-xs-6">
					<button type="button" data-action="generate-gcode" data-type="laser" id="laser-generate-gcode" class="btn btn-primary btn-block action-button"><i class="fa fa-cog"></i> <?php echo _("Generate GCode"); ?></button>
				</div>
				<div class="col-sm-6  col-xs-6">
					<div class="row">
						<div class="col-sm-12 text-right">
							<span class="laser-status"> <?php echo _("Waiting for the GCode"); ?> </span>
							<a href="javascript:void(0);" title="<?php echo _("Save GCode");?>"     class="btn btn-default action-button" data-action="open-save-modal" id="laser-save-gcode"><i class="fa fa-save"></i></a>
							<a href="javascript:void(0);" title="<?php echo _("Engrave");?>"        class="btn btn-default action-button" data-action="engrave-gcode"   id="laser-engrave-gcode"><i class="fa icon-communication-143"></i></a>
							<a href="javascript:void(0);" title="<?php echo _("Download GCode");?>" class="btn btn-default action-button" data-action="download-gcode"  id="download-button"><i class="fa fa-download"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<form class="laser-slicing-profile">
					<div class="col-sm-12">
						<ul id="laserSettingsTab" class="nav nav-tabs bordered">
							<li class="active"><a href="#laser-general-tab" data-toggle="tab"><?php echo _("General");?></a></li>
							<li><a href="#laser-pwm-mode-tab"      data-toggle="tab" class="raster-settings"> <?php echo _("PWM mode");?></a></li>
							<li><a href="#laser-feedrate-mode-tab" data-toggle="tab" class="raster-settings"> <?php echo _("Feedrate mode");?></a></li>
							<li><a href="#laser-skpi-lin-mode-tab" data-toggle="tab" class="raster-settings"> <?php echo _("Skip line mode");?></a></li>
						</ul>
						<div id="laserSettingsTabContent" class="tab-content padding-10">
							<!-- GENERAL TAB -->
							<div class="tab-pane fade in active" id="laser-general-tab">
								<div class="smart-form">
									<fieldset>
										<section>
											<label class="label"><?php echo _("Head");?></label>
											<label class="select">
												<?php echo form_dropdown('head', $laser_heads, $installed_head['fw_id'], 'id="head"'); ?><i></i>
											</label>
										</section>
										<div class="row dimensions-container">
											<section class="col col-6">
												<label class="input">
													<span class="icon-prepend"><?php echo _("Width");?></span>
													<input type="number" class="laser-monitor-change" name="target_width" id="target_width" type="number" value="30" />
												</label>
											</section>
											<section class="col col-6">
												<label class="input">
													<span class="icon-prepend"><?php echo _("Height");?></span>
													<input type="number" class="laser-monitor-change" name="target_height" id="target_height" type="number" value="0" />
												</label>
											</section>
										</div>
										<div class="row margin-top-10 margin-bottom-10">
    										<section class="col col-4 raster-settings">
    											<label class="checkbox"><input class="laser-monitor-change" id="invert" name="invert" type="checkbox"><i></i> <span><?php echo _("Invert colors");?></span></label>
    										</section>
    										<section class="col col-3">
    											<label class="checkbox"><input class="laser-monitor-change" id="fan" name="fan"  type="checkbox"><i></i> <span><?php echo _("Fan on");?></span></label>
    										</section>
    										<section  class="col col-4">
												<label class="checkbox"><input class="laser-monitor-change" id="off-during-travel" name="pwm-off_during_travel" checked="checked" type="checkbox"><i></i> <span><?php echo _("Turn laser off during travel moves");?></span></label>
											</section>
										</div>
										
										<section>
											<label class="label"><?php echo _("Profile");?></label>
											<label class="select">
												<select name="laser-profile" class="laser-monitor-change" id="laser-profile"></select> <i></i>
											</label>
											<div id="laser-profile-description" class="note"></div>
										</section>
										<section class="raster-settings">
											<label class="input">
												<span class="icon-prepend"><?php echo _("Dot size");?></span>
												<input type="number" id="dot_size" class="laser-monitor-change" name="general-dot_size" type="number" value="0.1" step="0.01" />
											</label>
										</section>
										<section class="raster-settings">
											<label class="label"><?php echo _("Number of gray levels") ?> (<span id="grey-levels-slider-value">1</span>)</label>
											<input id="grey-levels-slider" type="text" name="range_2a" value="">
										</section>
										
									</fieldset>
									<!-- layer settings -->
									<!-- Layers -->
									<fieldset>
										<div class="layer-settings" style="display: none">
											<label>Layer mapping</label>
										</div>
										<div class="row laser-cut-z-settings" style="display: none">
											<hr class=" margin-bottom-10">
											<section class="col col-1"></section>
											<section class="col col-5">
												<label class="input">
													<span class="icon-prepend"><?php echo _("Z Depth");?></span>
													<input type="number" class="laser-monitor-change" value="0" min="0" max="5" step="0.1" id="z-depth" name="z-depth"/>
												</label>
											</section>
											<section class="col col-5">
												<label class="input">
													<span class="icon-prepend"><?php echo _("Z Steps");?></span>
													<input type="number" class="laser-monitor-change" value="5" min="0" max="5" step="1" id="z-steps" name="z-steps" />
												</label>
											</section>
										</div>
									</fieldset>
								</div>
							</div>
							<!-- END GENERAL TAB -->
							
							<!--  -->
							<div class="tab-pane fade in" id="laser-pwm-mode-tab">
								<div class="smart-form">
									<fieldset>
										<section>
											<label class="select"><?php echo form_dropdown('pwm-type', $options_mode, null, 'id="laser-pwm-mode" class="laser-monitor-change"');?> <i></i></label>
										</section> <div class="note">
										<div class="laser-pwm-settings" id="laser-pwm-const">
											<div class="row">
												<section class="col col-6">
													<label class="input">
														<span class="icon-prepend"><?php echo _("Value");?></span>
														<input name="pwm-value" class="laser-monitor-change" type="number" value="0" />
													</label>
												</section>
											</div>
											<div class="note"><p><?php echo _("Laser PWM will be set to a constant value");?></p></div>
										</div>
										<div class="laser-pwm-settings" id="laser-pwm-linear">
											<div class="row">
												<section class="col col-6">
													<label class="input">
														<span class="icon-prepend"><?php echo _("Input min");?></span>
														<input name="pwm-in_min" class="laser-monitor-change" type="number" value="0">
													</label>
												</section>
												<section class="col col-6">
													<label class="input">
														<span class="icon-prepend"><?php echo _("Input Max");?></span>
														<input name="pwm-in_max" class="laser-monitor-change" type="number" value="0">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-6">
													<label class="input">
														<span class="icon-prepend"><?php echo _("Output min");?></span>
														<input name="pwm-out_min" class="laser-monitor-change" type="number" value="0">
													</label>
												</section>
												<section class="col col-6">
													<label class="input">
														<span class="icon-prepend"><?php echo _("Output Max");?></span>
														<input name="pwm-out_max" class="laser-monitor-change" type="number" value="0">
													</label>
												</section>
											</div>
											<div class="note"><p><?php echo _("Laser PWM will be calculated based on pixel color value");?>  - <a data-toggle="modal" data-target="#linearmappingHelp" href="#"><?php echo _("More info");?></a></p></div>
										</div>
									</fieldset>
								</div>
							</div>
							<!--  -->
							
							<!--  -->
							<div class="tab-pane fade in" id="laser-feedrate-mode-tab">
								<div class="smart-form">
									<fieldset>
										<section>
											<label class="select"><?php echo form_dropdown('speed-type', $options_mode, null, 'id="laser-speed-mode" class="laser-monitor-change"');?> <i></i></label>
										</section>
										
										<div class="laser-speed-settings" id="laser-speed-const">
											<div class="row">
												<section class="col col-6">
													<label class="input">
														<span class="icon-prepend"><?php echo _("Burn");?></span>
														<input name="speed-burn" class="laser-monitor-change" type="number" value="1000">
													</label>
												</section>
												<section class="col col-6">
													<label class="input">
														<span class="icon-prepend"><?php echo _("Travel");?></span>
														<input name="speed-travel" class="laser-monitor-change" type="number" value="10000">
													</label>
												</section>
											</div>
											<div class="note"><p><?php echo _("Feedrate will be set to a constant value");?></p></div>
										</div>
										<div class="laser-speed-settings" id="laser-speed-linear">
											<div class="row">
												<section class="col col-6">
													<label class="input">
														<span class="icon-prepend"><?php echo _("Input min");?></span>
														<input name="speed-in_min" class="laser-monitor-change" type="number" value="0">
													</label>
												</section>
												<section class="col col-6">
													<label class="input">
														<span class="icon-prepend"><?php echo _("Input max");?></span>
														<input name="speed-in_max" class="laser-monitor-change" type="number" value="255">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-6">
													<label class="input">
														<span class="icon-prepend"><?php echo _("Output min");?></span>
														<input name="speed-out_min" class="laser-monitor-change" type="number" value="0">
													</label>
												</section>
												<section class="col col-6">
													<label class="input">
														<span class="icon-prepend"><?php echo _("Output max");?></span>
														<input name="speed-out_max" class="laser-monitor-change" type="number" value="255">
													</label>
												</section>
											</div>
											<div class="note"><p><?php echo _("Feedrate will be calculated based on pixel color value");?></p></div>
										</div>
									</fieldset>
								</div>
							</div>
							<!--  -->
							
							<!--  -->
							<div class="tab-pane fade in raster-settings" id="laser-skpi-lin-mode-tab">
								<div class="smart-form">
									<fieldset>
										<section>
											<label class="select"><?php echo form_dropdown('skip-type', $options_skip_line_mode, null, 'id="laser-skip-mode" class="laser-monitor-change"');?> <i></i></label>
										</section>
										<div class="laser-skip-settings">
											<div class="row">
												<section class="col col-6">
													<label class="input">
														<span class="icon-prepend"><?php echo _("Group size");?></span>
														<input name="skip-mod" class="laser-monitor-change" type="number" value="0">
													</label>
												</section>
												<section class="col col-6">
													<label class="input">
														<span class="icon-prepend"><?php echo _("Pattern");?></span>
														<input name="skip-on" class="laser-monitor-change" type="text" value="0">
													</label>
												</section>
											</div>
											<div class="note"><p><?php echo _("Control if and how many laser lines will be skipped");?>  - <a data-toggle="modal" data-target="#skiplineHelp" href="#"><?php echo _("More info");?></a></p></div>
										</div>
									</fieldset>
								</div>
							</div>
							<!--  -->
						</div>
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>
<!-- END LASER TAB -->
<!-- Linear Mapping Help Modal -->
<div class="modal fade" id="linearmappingHelp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><?php echo _("Linear mapping");?></h4>
			</div>
			<div class="modal-body">
				<?php echo $linear_mapping_help?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _("Close");?></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- / Linear Mapping Help Modal .modal -->

<!-- Skip Help Modal -->
<div class="modal fade" id="skiplineHelp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><?php echo _("Skip Line");?></h4>
			</div>
			<div class="modal-body">
				<?php echo $skip_line_help;?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _("Close");?></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /Skip Help Modal .modal -->
