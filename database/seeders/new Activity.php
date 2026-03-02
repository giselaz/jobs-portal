<?php
$createdByUser = $this->getModel()->getCreatedBy() ? Deep::getModel('deep_admin/user')->loadByUsername($this->getModel()->getCreatedBy()) : null;
$modelInstance = $this->getModel()->loadModelInstance();
$assignedUser = $modelInstance ? $modelInstance->getAssignedUser() : null;
$requesterUser = $modelInstance ? $modelInstance->getRequesterUser() : null;
$lagnielCustomer = 46;

?>


<?php $this->includeTemplate("header") ?>
<!-- Start of Main Content -->
<tr style="">
    <td bgcolor="#FFFFFF" align="center" style="">
        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidth" style="">
            <tbody style="">
                <!-- Start Spacer -->
                <tr>
                    <td class="w22" width="41" style="font-size:1px; line-height:1px;">&nbsp;</td>
                    <td class="h26" height="36" style="font-size:1px; line-height:1px;">&nbsp;</td>
                    <td class="w22" width="41" style="font-size:1px; line-height:1px;">&nbsp;</td>
                </tr>
                <!-- End Spacer -->
                <tr style="">
                    <td class="w22" width="41" style="font-size:1px; line-height:1px;">&nbsp;</td>
                    <td class="mktEditable content mktEditable content" id="edit_text_1" valign="middle" style="font-family:Calibri, Helvetica, sans-serif; font-size:16px; color:#505050; text-align:left; line-height:25.6px; font-weight:normal; text-transform:none;">
                        <p>
                            <br>
                            <?php $headerUser = $requesterUser ? $requesterUser->getDisplayUsername() : Deep::helper('deep_email')->__('User'); ?>
                            <?php echo Deep::helper('deep_email')->__('Dear %s', $headerUser) ?>,<br>


                            <?php echo Deep::helper('deep_email')->__('An Activity has been') ?> <?php if ($this->getModel()->isObjectNew()) : ?><b><?php echo Deep::helper('deep_email')->__('created') ?></b><?php else: ?><b><?php echo Deep::helper('deep_email')->__('updated') ?></b><?php endif; ?>
                            <?php echo Deep::helper('deep_email')->__('for Ticket ID') ?>: <b style="font-weight: 700;"><?php echo $this->getModel()->getModelId() ?></a></b><br>

                            <!-- Created by -->
                            <?php if ($createdByUser && $createdByUser->getId()): ?>
                                <?php if ($createdByUser->getAvatar()): ?>
                                    <br><img src="<?php echo $createdByUser->getAvatarUrl() ?>" border="0" style="-ms-interpolation-mode: bicubic;" width="16" />
                                <?php endif; ?>
                                &nbsp;&nbsp;&nbsp;<?php echo $createdByUser->getDisplayUsername() ?><br>
                            <?php endif; ?>

                            <!-- Activity Description -->
                            <br><?php echo $this->getModel()->getDescription() ?><br>

                        </p>
                    </td>
                    <td class="w22" width="41" style="font-size:1px; line-height:1px;">&nbsp;</td>
                </tr>
                <!-- Start Spacer -->
                <tr>
                    <td class="w22" width="41" style="font-size:1px; line-height:1px;">&nbsp;</td>
                    <td height="30" style="font-size:1px; line-height:1px;">&nbsp;</td>
                    <td class="w22" width="41" style="font-size:1px; line-height:1px;">&nbsp;</td>
                </tr>
                <!-- End Spacer -->
            </tbody>
        </table>
    </td>
</tr>
<!-- End of Main Content -->
<?php $url = $modelInstance->getUrlByUser($requesterUser); ?>

<!-- start of Button -->
<?php if ($requesterUser->isInGroup($lagnielCustomer)): ?>
    <tr style="">
        <td bgcolor="#FFFFFF" align="center" class="mktEditable" id="edit_cta_button" style="">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td class="w22" width="41" style="font-size: 1px; line-height: 1px;">&nbsp;</td>
                        <td align="left">
                            <table class="button" cellpadding="0" cellspacing="0" border="0" align="left" bgcolor="#0080ff" style="-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">
                                <tbody>
                                    <tr>
                                        <td width="518" align="center" valign="middle" height="65">
                                            <span style="color: #ffffff; text-decoration: none;">
                                                <a class="mobButton mktNoTok" href="<?php echo $url ?>" style="font-family: Calibri, Helvetica, sans-serif; font-size: 16px; color: #ffffff; display: block; height: 65px; mso-line-height-rule: exactly; line-height: 65px; font-weight: normal; text-decoration: none; text-align: center!important;" target="_blank" title="Link al ticket">
                                                    <?php echo Deep::helper('deep_email')->__('Go to the Ticket') ?>
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td class="w22" width="41" style="font-size: 1px; line-height: 1px;">&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
<?php endif; ?>
<!-- end of Button -->

<?php $this->includeTemplate("footer") ?>