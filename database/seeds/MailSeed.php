<?php

use Illuminate\Database\Seeder;

class MailSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tbl_auto_respond_mails = array(
            array('id' => '1','email_section' => 'Registration','email_subject' => 'Welcome  to {site_name}','email_content' => '<table style="width:100%" border="0">    <tbody>    <tr>        <td style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top" align="center">           <table id="templateHeader" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FFFFFF;border-top: 0;border-bottom: 0;" width="100%" cellspacing="0" cellpadding="0" border="0">                <tbody>                <tr>                    <td style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top" align="center">                        <table class="templateContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="600" cellspacing="0" cellpadding="0" border="0">                            <tbody>                            <tr>                                <td class="headerContainer" style="padding-top: 10px;padding-bottom: 10px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top">                                    <table class="mcnImageBlock" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0">                                        <tbody class="mcnImageBlockOuter">                                        <tr>                                            <td class="mcnImageBlockInner" style="padding: 9px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top">                                                <table class="mcnImageContentContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">                                                    <tbody>                                                    <tr>                                                        <td class="mcnImageContent" style="padding-right: 9px;padding-left: 9px;padding-top: 0;padding-bottom: 0;text-align: center;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top">                                                            <img alt="" class="mcnImage" src="https://worldbtob.com/mails/logo.png" style="max-width: 51px;padding-bottom: 0;display: inline !important;vertical-align: bottom;border: 0;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" width="51" align="middle">                                                        </td>                                                    </tr>                                                    </tbody>                                                </table>                                            </td>                                        </tr>                                        </tbody>                                    </table>                                </td>                            </tr>                            </tbody>                        </table>                    </td>                </tr>                </tbody>            </table>        </td>    </tr>    <tr>        <td colspan="2"><strong>Hi ,</strong></td>    </tr>    <tr>        <td colspan="2">We are happy to have you as the newest member of {site_name} !</td>    </tr>    <tr>        <td colspan="2">&nbsp;</td>    </tr>    <tr colspan="2">        <td><p>Thank you for signing up for {site_name}! Just one small step before you get started. Click the button                below to verify your email address.</p>        </td>    </tr>    <tr>        <td class="mcnButtonContent" style="font-family: Tahoma, Verdana, Segoe, sans-serif;font-size: 20px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="middle" align="center"><a style="margin-top:20px; margin-bottom:20px; text-decoration: none; background: #1E89DA; border-radius: 3px; color: #fff; padding: 10px 30px; display: inline-block; cursor: pointer; border-bottom: 3px solid #1265A5" href="{link}"> Verify your email </a></td>    </tr>    <tr>        <td colspan="2"><p>You signed up for {site_name} with your email <a href="\\" mailto:{email}\\""="" style="\\" word-wrap:"="" break-word;-ms-text-size-adjust:="" 100%;-webkit-text-size-adjust:="" 100%;color:="" #000000;font-weight:="" normal;text-decoration:="" underline;\\"="">{email}</a> We’re sorry if it wasn’t                you. Just ignore this email.</p>            <p>We hope you will visit us again soon and put these special services to work foryou.</p>            Please feel free to contact us if you have any questions at all.        </td>    </tr>    <tr>        <td colspan="2">&nbsp;</td>    </tr>    <tr>        <td colspan="2">Thank you.<br> {site_name} Customer Service<br> Email: <a href="mailto:{admin_email}" style="word-wrap: break-word;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #000000;font-weight: normal;text-decoration: underline;">{admin_email}</a><br>           </td>    </tr>    <tr>        <td colspan="2" style="text-align:center">© 2015 {site_name}. All right reserved.</td>    </tr>    </tbody></table>','email_content_fa' => '<table border="0" style="text-align: right; width: 960px;font-family:tahoma;direction:rtl;">
    <tbody>
    <tr>
        <td colspan="2"><span style="font-weight: 700;">سلام</span> <span>{user[firstName]}</span> <span>{user[lastName]}</span>        </td>
    </tr>
    <tr>
        <td colspan="2"><p><br></p>
            <p>ما خوشحالیم که شما به عنوان تازه ترین عضو از سایت {site_name} هستید !&nbsp;<span style="background-color: transparent;">با تشکر از شما برای ثبت نام در سایت {site_name}!</span></p>
        </td>
    </tr>
    <tr colspan="2">
        <td><p><span style="background-color: transparent;">فقط یک قدم کوچک قبل از اینکه شروع کنید. برای تأیید آدرس ایمیل                خود، روی دکمه زیر کلیک کنید.</span><br></p>
        </td>
    </tr>
    <tr>
        <td class="mcnButtonContent" valign="middle" align="center" style="font-family: Tahoma, Verdana, Segoe, sans-serif; font-size: 20px; text-size-adjust: 100%;"><a href="{link}" style="background-color: rgb(30, 137, 218); color: rgb(255, 255, 255); margin-top: 20px; margin-bottom: 20px; border-radius: 3px; padding: 10px 30px; display: inline-block; border-bottom: 3px solid rgb(18, 101, 165);">                ایمیل خود را تایید کنید </a></td>
    </tr>
    <tr>
        <td colspan="2">            <p style="text-align: right; ">                با ایمیل این {email} در سایت                <a href="{site_link}">{site_name} </a>                    .برای شما ثبت نام انجام شده است اگر شما نبودید لطفا این ایمیل را نایدیده بگیرید.</p>
            <p style="text-align: right; "><br></p>
<div style="text-align: right;"><span style="background-color: transparent;">لطفا در صورت بروز هر گونه سؤال، لطفا با ما تماس بگیرید.</span>                </div>
            </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right;"><br></td>
    </tr>
    <tr>
        <td colspan="2">            <div style="text-align: right;"><span style="background-color: transparent;">روابط عمومی سایت   </span><span style="background-color: transparent;">                </span><a href="{site_link}">{site_name}</a><br></div>
            <div style="text-align: right;"><span style="background-color: transparent;">ایمیل:  </span><a href="mailto:{admin_email}" style="color: rgb(0, 0, 0); text-decoration-line: underline; word-wrap: break-word; text-size-adjust: 100%;">{admin_name}</a>            </div>
                    </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;"><br></td>
    </tr>
    </tbody>
</table>','email_subject_fa' => 'به سایت {site_name} خوش آمدید','status' => '1','updated_on' => '2018-08-26 18:09:50'),
            array('id' => '2','email_section' => 'Forgot Password','email_subject' => 'Forgot Password','email_content' => '<table border="0" style="width:100%"> <tbody>  <tr>   <td colspan="2"><strong>Hi {mem_name},</strong></td>  </tr>  <tr>   <td colspan="2">Your login details are as follows:</td>  </tr>  <tr>   <td colspan="2">&nbsp;</td>  </tr>  <tr>   <td><strong>Email ID:</strong></td>   <td>{username}</td>  </tr>  <tr>   <td><strong>password:</strong></td>   <td>{password}</td>  </tr>  <tr>   <td colspan="2">&nbsp;</td>  </tr>  <tr>   <td colspan="2">Click here to login {link}</td>  </tr>  <tr>   <td colspan="2">&nbsp;</td>  </tr>  <tr>   <td colspan="2">Thank you.<br>   {site_name} Customer Service<br>   Email: {admin_email}</td>  </tr>  <tr>   <td colspan="2" style="text-align:center">© 2015 {site_name}. All right reserved.</td>  </tr> </tbody></table>','email_content_fa' => '<table border="0" style="direction:rtl;width:100%;"> <tbody>  <tr>   <td colspan="2"><span style="font-weight: bold;">سلام {mem_name}</span></td>  </tr>  <tr>   <td colspan="2">جزئیات ورود شما به شرح زیر است:</td>  </tr>  <tr>   <td colspan="2">&nbsp;</td>  </tr>  <tr>   <td><strong>آدرس ایمیل:</strong></td>   <td>{username}</td>  </tr>  <tr>   <td><strong>رمز عبور:</strong></td>   <td>{password}</td>  </tr>  <tr>   <td colspan="2">&nbsp;</td>  </tr>  <tr>   <td colspan="2">برای ورود کلیک&nbsp;{link}&nbsp;کنید.<br></td></tr><tr><td colspan="2">&nbsp;</td>  </tr>  <tr>   <td colspan="2"><p>با تشکر از شما</p><p><span style="background-color: transparent;"><br></span></p><p><span style="background-color: transparent;">روابط عمومی سایت:&nbsp;</span><span style="background-color: transparent;">{site_name}</span></p><p><span style="background-color: transparent;">ایمیل:&nbsp;</span><span style="background-color: transparent;">{admin_email}</span><br></p></td>  </tr>  <tr>   <td colspan="2" style="text-align:center"><br></td>  </tr> </tbody></table>','email_subject_fa' => '','status' => '1','updated_on' => '2018-08-24 11:59:42'),
            array('id' => '3','email_section' => 'Refer To Friends','email_subject' => '{from_name} Refer a Friend  {friend_name}','email_content' => '<table align="center" border="0" cellpadding="0" cellspacing="0" style="border:2px solid #e9e9e9; margin-top:10px; width:600px">
 <tbody>
  <tr>
   <td style="text-align:left">Hi {friend_name}, </td>
  </tr>
  <tr>
   <td>   <p><span style="background-color: transparent;">{from_name} has recommended this {text}, as {from_name} thinks you would like it.</span></p>
<p>   <br>   To view the Deal details please click on the following link.<br>   <br>   <a href="{link}" target="_blank">{link}   </a></p>
<p>Thanks and Regards,</p>
   <p>{site_name} Team</p>
   </td>
  </tr>
  <tr>
   <td style="text-align:center">© 2013 {site_name}. All right reserved.</td>
  </tr>
 </tbody>
</table>','email_content_fa' => '<table align="center" border="0" cellpadding="0" cellspacing="0" style="text-align: right;font-family:tahoma;direction:rtl; border: 2px solid rgb(233, 233, 233); margin-top: 10px; width: 600px;">
 <tbody>
  <tr>
   <td style="text-align: right;font-family:tahoma;"> سلام {friend_name}, </td>
  </tr>
  <tr>
   <td style="text-align: right;font-family:tahoma;">   <p>{from_name} این {text} را توصیه کرده است، زیرا {from_name} فکر میکند شما آن را دوست دارید.<br>   <br>برای مشاهده جزئیات اطلاعات لطفا روی لینک زیر کلیک کنید.<br>   <br>   <a href="{link}" target="_blank">{link}   </a></p>
<p style="text-align: right;font-family:tahoma;">با تشکر ،</p>
   <p style="text-align: right;font-family:tahoma;">{site_name}</p>
   </td>
  </tr>
  <tr>
   <td style="text-align: center;font-family:tahoma;"><br></td>
  </tr>
 </tbody>
</table>','email_subject_fa' => '{from_name} پشنهاد می کند به  {friend_name}','status' => '1','updated_on' => '2018-08-24 12:08:11'),
            array('id' => '4','email_section' => 'Enquiry','email_subject' => 'Enquiry Received on lead {lead}','email_content' => '<table border="0" style="width:100%">

 <tbody>

  <tr>

   <td colspan="2"><strong>Dear {mem_name}</strong></td>

  </tr>

  <tr>

   <td colspan="2">Enquiry received with following info :</td>

  </tr>

  <tr>

   <td colspan="2">&nbsp;{company_name}</td>

  </tr>

  <tr>

   <td><strong>Name:</strong></td>

   <td>{name}</td>

  </tr>
<tr>

   <td><strong>Email:</strong></td>

   <td>{email}</td>

  </tr>

  <tr>

   <td><strong>Phone no.:</strong></td>

   <td>{phone}</td>

  </tr>

  <tr>

   <td><strong>Comments:</strong></td>

   <td>{description}</td>

  </tr>

  <tr>

   <td colspan="2">&nbsp;</td>

  </tr>

  <tr>

   <td colspan="2">&nbsp;</td>

  </tr>

 </tbody>

</table>


<p><br>
Thank you.<br>
{site_name} Customer Service<br>
Email: {admin_email}</p>','email_content_fa' => '<table border="0" style="width:100%;direction:rtl;"> <tbody>  <tr>   <td style="text-align: right;font-family:tahoma;" colspan="2"><strong>{mem_name} عزیز</strong></td>  </tr>  <tr>   <td style="text-align: right;font-family:tahoma;" colspan="2">درخواستی با اطلاعات زیر دریافت شده است: :</td>  </tr>  <tr>   <td colspan="2">&nbsp;{company_name}</td>  </tr>  <tr>   <td style="text-align: right;font-family:tahoma;"><strong>نام:</strong></td>   <td style="font-family:tahoma;">{name}</td>  </tr><tr>   <td style="text-align: right;font-family:tahoma;"><strong>ایمیل:</strong></td>   <td style="font-family:tahoma;">{email}</td>  </tr>  <tr>   <td style="text-align: right;font-family:tahoma;"><strong>شماره تلفن :</strong></td>   <td style="font-family:tahoma;">{phone}</td>  </tr>  <tr>   <td style="text-align: right;font-family:tahoma;"><strong>یادداشت- توضیح :</strong></td>   <td style="font-family:tahoma;">{description}</td>  </tr>  <tr>   <td style="text-align: right;font-family:tahoma;" colspan="2">&nbsp;</td>  </tr>  <tr>   <td style="text-align: right;font-family:tahoma;" colspan="2">&nbsp;</td>  </tr> </tbody></table><p style="width:100%;direction:rtl;"><br></p><p style="width: 975px; direction: rtl;">باتشکر</p><p style="width:100%;direction:rtl;">روابط عمومی سایت {site_name}&nbsp;<br>ایمیل: {admin_email}</p>','email_subject_fa' => 'درخواست دریافت شد در آگهی  {lead}','status' => '1','updated_on' => '2018-11-12 15:00:08'),
            array('id' => '5','email_section' => 'Contact Us','email_subject' => ' enquiry received {site_name}','email_content' => '<table border="0" style="width:100%">

 <tbody>

  <tr>

   <td colspan="2"><strong>Dear {name}</strong></td>

  </tr>

  <tr>

   <td colspan="2">Enquiry&nbsp; has been submitted with following info :</td>

  </tr>

  <tr>

   <td colspan="2">&nbsp;</td>

  </tr>

  <tr>

   <td><strong>name:</strong></td>

   <td>{name}</td>

  </tr>

  <tr>

   <td><strong>email:</strong></td>

   <td>{email}</td>

  </tr>

  <tr>

   <td><strong>phone no:</strong></td>

   <td>{phoneNumber}<br></td>

  </tr>

  <tr>

   <td><strong>mobile no:</strong></td>

   <td>{mobile}</td>

  </tr>

  <tr>

   <td><strong>comments:</strong></td>

   <td>{comment}</td>

  </tr>

  <tr>

   <td colspan="2">&nbsp;</td>

  </tr>

 </tbody>

</table>


<p><br>
Thank you.<br>
{site_name} Customer Service<br>
Email: {admin_email}</p>','email_content_fa' => '<table border="0" style="width:100%;direction:rtl;">
 <tbody>
  <tr>
   <td style="font-family:tahoma;" colspan="2"><strong>&nbsp;{name} عزیز</strong></td>
  </tr>
  <tr>
   <td style="font-family:tahoma;" colspan="2">درخواست با اطلاعات زیر ارسال شده است :</td>
  </tr>
  <tr>
   <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
   <td style="font-family:tahoma;"><strong>نام :</strong></td>
   <td style="font-family:tahoma;">{name}</td>
  </tr>
  <tr>
   <td style="font-family:tahoma;"><strong>ایمیل :</strong></td>
   <td style="font-family:tahoma;">{email}</td>
  </tr>
  <tr>
   <td style="font-family:tahoma;"><strong>شماره تلفن :</strong></td>
   <td style="font-family:tahoma;">{phoneNumber}<br></td>
  </tr>
  <tr>
   <td style="font-family:tahoma;"><strong>شماره همراه :</strong></td>
   <td style="font-family:tahoma;">{mobile}</td>
  </tr>
  <tr>
   <td style="font-family:tahoma;"><strong>نظر- پیام :</strong></td>
   <td style="font-family:tahoma;">{comment}</td>
  </tr>
  <tr>
   <td colspan="2">&nbsp;</td>
  </tr>
 </tbody>
</table>
<p style="width:100%;direction:rtl;font-family:tahoma;"><br>با تشکر</p>
<p style="width:100%;direction:rtl;font-family:tahoma;">روابط عمومی سایت {site_name}&nbsp;<br>ایمیل : {admin_email}</p>','email_subject_fa' => 'درخواست دریافت شد در سایت {site_name}','status' => '1','updated_on' => '2018-08-25 17:46:10'),
            array('id' => '6','email_section' => 'Accept  circle requests','email_subject' => 'Circle  requests accepted','email_content' => '<table border="0" width="100%">
	<tbody>
		<tr>
			<td colspan="2">
				<strong>Dear {mem_name}</strong></td>
		</tr>
		<tr>
			<td align="center">
				{user_pic}</td>
			<td>
				{poster_name} has joined&nbsp; your circle on {site_name}</td>
		</tr>
		<tr>
			<td>
				&nbsp;</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="10%">
				&nbsp;</td>
			<td>
				To view {poster_name} profile {link}</td>
		</tr>
	</tbody>
</table>
<br />
<span style="margin-top: 15px;">Thank you.<br />
{site_name} Customer Service<br />
Email: {admin_email} </span>','email_content_fa' => NULL,'email_subject_fa' => NULL,'status' => '2','updated_on' => '2012-09-13 16:48:37'),
            array('id' => '7','email_section' => 'New circle Request','email_subject' => 'New circle request received ','email_content' => '<table border="0" width="100%">
	<tbody>
		<tr>
			<td colspan="4">
				<strong>Dear {mem_name}</strong></td>
		</tr>
		<tr>
			<td align="center">
				{user_pic}</td>
			<td colspan="3">
				{poster_name} invited you to join a circle on {site_name}</td>
		</tr>
		<tr>
			<td>
				&nbsp;</td>
			<td colspan="3">
				&nbsp;</td>
		</tr>
		<tr>
			<td width="9%">
				&nbsp;</td>
			<td align="right" valign="top" width="7%">
				{accept}</td>
			<td align="center" valign="top" width="1%">
				<strong>||</strong></td>
			<td align="left" valign="top" width="83%">
				{decline}</td>
		</tr>
	</tbody>
</table>
<br />
<span style="margin-top: 15px;">Thank you.<br />
{site_name} Customer Service<br />
Email: {admin_email} </span>','email_content_fa' => NULL,'email_subject_fa' => NULL,'status' => '2','updated_on' => '2012-05-07 16:39:58'),
            array('id' => '8','email_section' => 'Wall Comment','email_subject' => 'A comment  on your wall','email_content' => '<table border="0" width="100%">
	<tbody>
		<tr>
			<td colspan="2">
				<strong>Dear {mem_name}</strong></td>
		</tr>
		<tr>
			<td colspan="2">
				{poster_name} has commented on your wall.</td>
		</tr>
		<tr>
			<td colspan="2">
				Please {link} to view the comment&nbsp;</td>
		</tr>
		<tr>
			<td width="26%">
				&nbsp;</td>
			<td>
				&nbsp;</td>
		</tr>
	</tbody>
</table>
<br />
<span style="margin-top: 15px;">Thank you.<br />
{site_name} Customer Service<br />
Email: {admin_email} </span>','email_content_fa' => NULL,'email_subject_fa' => NULL,'status' => '2','updated_on' => '2012-01-25 12:20:23'),
            array('id' => '9','email_section' => 'Post comment on circle','email_subject' => 'Received  a new comment on your topic in a circle','email_content' => '<table border="0" width="100%">
	<tbody>
		<tr>
			<td colspan="2">
				<strong>Dear {mem_name}</strong></td>
		</tr>
		<tr>
			<td colspan="2">
				{poster_name} has commented on&nbsp;your topic in a circle.</td>
		</tr>
		<tr>
			<td colspan="2">
				Please {link} to view the comment&nbsp;</td>
		</tr>
		<tr>
			<td width="26%">
				&nbsp;</td>
			<td>
				&nbsp;</td>
		</tr>
	</tbody>
</table>
<br />
<span style="margin-top: 15px;">Thank you.<br />
{site_name} Customer Service<br />
Email: {admin_email} </span>','email_content_fa' => NULL,'email_subject_fa' => NULL,'status' => '2','updated_on' => '2012-05-09 15:23:53'),
            array('id' => '10','email_section' => 'Post topic on circle','email_subject' => 'Receive new topic on circle','email_content' => '<table border="0" width="100%">
	<tbody>
		<tr>
			<td colspan="2">
				<strong>Dear {mem_name}</strong></td>
		</tr>
		<tr>
			<td colspan="2">
				{poster_name} has posted topic on your circle.</td>
		</tr>
		<tr>
			<td colspan="2">
				Please {link} to view the comment&nbsp;</td>
		</tr>
		<tr>
			<td width="26%">
				&nbsp;</td>
			<td>
				&nbsp;</td>
		</tr>
	</tbody>
</table>
<br />
<span style="margin-top: 15px;">Thank you.<br />
{site_name} Customer Service<br />
Email: {admin_email} </span>','email_content_fa' => NULL,'email_subject_fa' => NULL,'status' => '2','updated_on' => '2012-04-23 15:09:39'),
            array('id' => '11','email_section' => 'Wall Topic Post','email_subject' => 'New post  on your wall','email_content' => '<table border="0" width="100%">
	<tbody>
		<tr>
			<td colspan="2">
				<strong>Dear {mem_name}</strong></td>
		</tr>
		<tr>
			<td colspan="2">
				{poster_name} has posted {txt_name} on your wall.</td>
		</tr>
		<tr>
			<td colspan="2">
				Please click here {link} to view the comment&nbsp;</td>
		</tr>
		<tr>
			<td width="26%">
				abc</td>
			<td>
				&nbsp;</td>
		</tr>
	</tbody>
</table>
<br />
<span style="margin-top: 15px;">Thank you.<br />
{site_name} Customer Service<br />
Email: {admin_email} </span>','email_content_fa' => NULL,'email_subject_fa' => NULL,'status' => '2','updated_on' => '2012-05-28 11:15:41'),
            array('id' => '12','email_section' => 'New Trooper Request','email_subject' => 'New Trooper request','email_content' => '<table border="0" width="100%">
	<tbody>
		<tr>
			<td colspan="4">
				<strong>Dear {mem_name}</strong></td>
		</tr>
		<tr>
			<td align="middle">
				{user_pic}</td>
			<td colspan="3">
				{poster_name} wants to add you as a trooper&nbsp;on {site_name}</td>
		</tr>
		<tr>
			<td>
				&nbsp;</td>
			<td colspan="3">
				&nbsp;</td>
		</tr>
		<tr>
			<td width="9%">
				&nbsp;</td>
			<td align="right" valign="top" width="7%">
				{accept}</td>
			<td align="middle" valign="top" width="1%">
				<strong>||</strong></td>
			<td align="left" valign="top" width="83%">
				{decline}</td>
		</tr>
	</tbody>
</table>
<br />
<span style="margin-top: 15px">Thank you.<br />
{site_name} Customer Service<br />
Email: {admin_email} </span>','email_content_fa' => NULL,'email_subject_fa' => NULL,'status' => '2','updated_on' => '2012-05-08 15:27:26'),
            array('id' => '13','email_section' => 'Accepts Trooper Request','email_subject' => 'Trooper request accepted','email_content' => '<table border="0" width="100%">
	<tbody>
		<tr>
			<td colspan="2">
				<strong>Dear {mem_name}</strong></td>
		</tr>
		<tr>
			<td align="middle">
				{user_pic}</td>
			<td>
				{poster_name} accepted your&nbsp;trooper request&nbsp;on {site_name}</td>
		</tr>
		<tr>
			<td>
				&nbsp;</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="10%">
				&nbsp;</td>
			<td>
				To view {poster_name} profile {link}</td>
		</tr>
	</tbody>
</table>
<br />
<span style="margin-top: 15px">Thank you.<br />
{site_name} Customer Service<br />
Email: {admin_email} </span>','email_content_fa' => NULL,'email_subject_fa' => NULL,'status' => '2','updated_on' => '2012-05-08 14:46:17'),
            array('id' => '14','email_section' => 'Event  Invition','email_subject' => 'Event  Invitation from a trooper ','email_content' => '<table border="0" style="width: 615px; height: 88px;">
	<tbody>
		<tr>
			<td colspan="4">
				<strong>Dear {mem_name}</strong></td>
		</tr>
		<tr>
			<td align="left" colspan="4">
				{poster_name} invited you to attened an event on {site_name} . {click_here_link}&nbsp; to view the event.</td>
		</tr>
	</tbody>
</table>
<br />
<br />
<span style="margin-top: 15px;">Thank you.<br />
{site_name} Customer Service<br />
Email: {admin_email} </span>','email_content_fa' => NULL,'email_subject_fa' => NULL,'status' => '2','updated_on' => '2012-09-13 17:17:08'),
            array('id' => '15','email_section' => 'comments on my collections','email_subject' => 'comments received  on collection','email_content' => '<table border="0" width="100%">
	<tbody>
		<tr>
			<td colspan="2">
				<strong>Dear {mem_name}</strong></td>
		</tr>
		<tr>
			<td colspan="2">
				{poster_name} has commented on your collection.</td>
		</tr>
		<tr>
			<td colspan="2">
				Please {link} to view the comment&nbsp;</td>
		</tr>
		<tr>
			<td width="26%">
				&nbsp;</td>
			<td>
				&nbsp;</td>
		</tr>
	</tbody>
</table>
<br />
<span style="margin-top: 15px;">Thank you.<br />
{site_name} Customer Service<br />
Email: {admin_email} </span>','email_content_fa' => NULL,'email_subject_fa' => NULL,'status' => '2','updated_on' => '2012-05-07 13:10:21'),
            array('id' => '16','email_section' => 'Classified Post Email','email_subject' => 'New Classified Email','email_content' => '<table border="0" style="width:100%">
 <tbody>
  <tr>
   <td><strong>Dear Member</strong></td>
  </tr>
  <tr>
   <td><br />
   A new {AD_TYPE} advert <a href="{PRODUCT_LINK}" target="_blank">{PRODUCT_NAME}</a> has been posted in {CATEGORY_NAME}<br />
   <a href="{PRODUCT_LINK}">click here</a> to view details</td>
  </tr>
  <tr>
   <td>&nbsp;</td>
  </tr>
  <tr>
   <td>&nbsp;</td>
  </tr>
 </tbody>
</table>

<p><br />
Thank you.<br />
{site_name} Customer Service<br />
Email: {admin_email}</p>','email_content_fa' => NULL,'email_subject_fa' => NULL,'status' => '2','updated_on' => '2013-09-20 09:14:00'),
            array('id' => '17','email_section' => 'Feedback','email_subject' => 'Enquiry Feedback','email_content' => '<table border="0" style="width:100%">
 <tbody>
  <tr>
   <td colspan="2"><strong>Dear {name}</strong></td>
  </tr>
  <tr>
   <td colspan="2">Enquiry&nbsp; has been submitted with following info :</td>
  </tr>
  <tr>
   <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
   <td><strong>name:</strong></td>
   <td>{name}</td>
  </tr>
  <tr>
   <td><strong>email:</strong></td>
   <td>{email}</td>
  </tr>
  <tr>
   <td><strong>Feedback For.:</strong></td>
   <td>{feedback_for}</td>
  </tr>
  <tr>
   <td><strong>comments:</strong></td>
   <td>{comments}</td>
  </tr>
  <tr>
   <td colspan="2">&nbsp;</td>
  </tr>
  
 </tbody>
</table>

<p><br />
Thank you.<br />
{site_name} Customer Service<br />
Email: {admin_email}</p>','email_content_fa' => NULL,'email_subject_fa' => NULL,'status' => '2','updated_on' => '2013-06-24 11:48:22'),
            array('id' => '18','email_section' => 'Product Activation Mail','email_subject' => 'Product Activation Mail','email_content' => '<table border="0" style="width:100%">
 <tbody>
  <tr>
   <td><strong>Dear {MEMBER_NAME}</strong></td>
  </tr>
  <tr>
   <td><br />
   Your classified has been verified by the admin. Click below link to view details:<br />
   <br />
   <a href="{LINK_CLASSIFIED}">{LINK_CLASSIFIED}</a></td>
  </tr>
  <tr>
   <td>&nbsp;</td>
  </tr>
  <tr>
   <td>&nbsp;</td>
  </tr>
 </tbody>
</table>

<p><br />
Thank you.<br />
{site_name} Customer Service<br />
Email: {admin_email}</p>','email_content_fa' => NULL,'email_subject_fa' => NULL,'status' => '2','updated_on' => '2014-02-24 06:34:21'),
            array('id' => '19','email_section' => 'Lead Approval Mail','email_subject' => 'Lead approved at {site_name}','email_content' => '<table border="0" style="width:100%">

 <tbody>

  <tr>

   <td><strong>Dear {MEMBER_NAME}</strong></td>

  </tr>

  <tr>

   <td><br>
   Your lead {LEAD_NAME} has been approved by the admin. Click below link to view details:<br>
   <br>
   <a href="{LINK_CLASSIFIED}">{LINK_CLASSIFIED}</a></td>

  </tr>

 </tbody>

</table>


<p><br>
Thank you.<br>
{site_name} Customer Service<br>
Email: {admin_email}</p>','email_content_fa' => '<table border="0" style="width:100%;direction:rtl;"> <tbody>  <tr>   <td style="font-family:tahoma;"><strong>{MEMBER_NAME}&nbsp; عزیز</strong></td>  </tr>  <tr>   <td style="font-family:tahoma;"><br>   آگهی ثبت شده شما با عنوان&nbsp; {LEAD_NAME}&nbsp; توسط مدیریت سایت تایید شده است. برای مشاهده آگهی تایید شده خود&nbsp; می توانید بر روی&nbsp; لینک زیر کلیک کنید :<br>   <br>   <a href="{LINK_CLASSIFIED}">{LINK_CLASSIFIED}</a></td>  </tr> </tbody></table><p style="width:100%;direction:rtl;font-family:tahoma"><br>با تشکر.<br>روابط عمومی سایت {site_name}&nbsp;<br>ایمیل:&nbsp; {admin_email}</p>','email_subject_fa' => 'آگهی در {site_name} تایید شده است','status' => '1','updated_on' => '2018-10-10 02:34:40'),
            array('id' => '20','email_section' => 'Lead Rejection Mail','email_subject' => 'Lead rejected at {site_name}','email_content' => '<table border="0" style="width:100%"> <tbody>  <tr>   <td><strong>Dear {MEMBER_NAME}</strong></td>  </tr>  <tr>   <td><br>   Your lead {LEAD_NAME} has been rejected by the admin. Click below link to view details:<br>   <br>   <a href="{LINK_CLASSIFIED}">{LINK_CLASSIFIED}</a></td>  </tr> </tbody></table><p><br>Thank you.<br>{site_name} Customer Service<br>Email: {admin_email}</p>','email_content_fa' => '<table border="0" style="width:100%;direction:rtl;"> <tbody>  <tr>   <td style="font-family:tahoma;"><strong>{MEMBER_NAME} عزیز</strong></td>  </tr>  <tr>   <td style="font-family:tahoma;"><br>   آگهی شما {LEAD_NAME} توسط مدیر تایید نشده است. برای مشاهده جزئیات به لینک زیر کلیک کنید:<br>   <br>   <a href="{LINK_CLASSIFIED}">{LINK_CLASSIFIED}</a></td>  </tr> </tbody></table><p style="font-family:tahoma;direction:rtl;"><br>با تشکر<br>روابط عمومی سایت {site_name}&nbsp;<br>ایمیل :&nbsp; {admin_email}</p>','email_subject_fa' => '','status' => '1','updated_on' => '2018-08-24 13:13:50'),
            array('id' => '21','email_section' => 'Lead Activation Mail','email_subject' => 'Lead activated at {site_name}','email_content' => '<table border="0" style="width:100%">

 <tbody>

  <tr>

   <td><strong>Dear {MEMBER_NAME}</strong></td>

  </tr>

  <tr>

   <td><br>
   Your lead {LEAD_NAME} has been activated by the admin. Click below link to view details:<br>
   <br>
   <a href="{LINK_CLASSIFIED}">{LINK_CLASSIFIED}</a></td>

  </tr>

  <tr>

   <td>&nbsp;</td>

  </tr>

  <tr>

   <td>&nbsp;</td>

  </tr>

 </tbody>

</table>


<p><br>
Thank you.<br>
{site_name} Customer Service<br>
Email: {admin_email}</p>','email_content_fa' => '<table border="0" style="width:100%;direction:rtl;"> <tbody>  <tr>   <td style="font-family:tahoma;"><strong>{MEMBER_NAME} عزیز</strong></td>  </tr>  <tr>   <td style="font-family:tahoma;"><br>   آگهی شما&nbsp; {LEAD_NAME}&nbsp; توسط ادمین فعال شده است. برای مشاهده جزيیات روی لینک زیر کلیک کنید:<br>   <br>   <a href="{LINK_CLASSIFIED}">{LINK_CLASSIFIED}</a></td>  </tr>  <tr>   <td>&nbsp;</td>  </tr>  <tr>   <td>&nbsp;</td></tr></tbody></table><p style="font-family:tahoma;direction:rtl"><br>با تشکر</p><p style="font-family:tahoma;direction:rtl">روابط عمومی سایت {site_name}&nbsp;<br>ایمیل:&nbsp; {admin_email}</p>','email_subject_fa' => 'آگهی شما در {site_name} فعال شده است','status' => '1','updated_on' => '2018-09-06 04:55:03'),
            array('id' => '22','email_section' => 'Lead Deactivation Mail','email_subject' => 'Lead de-activated at {site_name}','email_content' => '<table border="0" style="width:100%">
 <tbody>
  <tr>
   <td><strong>Dear {MEMBER_NAME}</strong></td>
  </tr>
  <tr>
   <td><br>
   Your lead {LEAD_NAME} has been deactivated by the admin. Click below link to view details:<br>
   <br>
   <a href="{LINK_CLASSIFIED}">{LINK_CLASSIFIED}</a></td>
  </tr>
 </tbody>
</table>

<p><br>
Thank you.<br>
{site_name} Customer Service<br>
Email: {admin_email}</p>','email_content_fa' => '<table border="0" style="width:100%;direction:rtl;"> <tbody>  <tr>   <td style="font-family:tahoma;"><strong>{MEMBER_NAME} عزیز</strong></td>  </tr>  <tr>   <td style="font-family:tahoma;"><br>   آگهی شما&nbsp; {LEAD_NAME}&nbsp; توسط ادمین غیرفعال شده است. برای مشاهده جزيیات روی لینک زیر کلیک کنید:<br>   <br>   <a href="{LINK_CLASSIFIED}">{LINK_CLASSIFIED}</a></td>  </tr>  <tr>   <td>&nbsp;</td>  </tr>  <tr>   <td>&nbsp;</td></tr></tbody></table><p style="font-family:tahoma;direction:rtl"><br>با تشکر</p><p style="font-family:tahoma;direction:rtl">روابط عمومی سایت {site_name}&nbsp;<br>ایمیل:&nbsp; {admin_email}</p>','email_subject_fa' => '','status' => '1','updated_on' => '2018-08-24 13:18:11'),
            array('id' => '23','email_section' => 'Lead Post Mail','email_subject' => 'Lead posted at {site_name}','email_content' => '<table border="0" style="width:100%">
 <tbody>
  <tr>
   <td><strong>Dear {MEMBER_NAME}</strong></td>
  </tr>
  <tr>
   <td>
   <div>Thanks for posting ads B2B PORTAL.Your ad will be display after review by the B2B PORTAL team.</div>
   <br>
   <a href="{LINK_CLASSIFIED}">{LINK_CLASSIFIED}</a></td>
  </tr>
 </tbody>
</table>

<p><br>
Thank you.<br>
{site_name} Customer Service<br>
Email: {admin_email}</p>','email_content_fa' => '<table border="0" style="width:100%;direction:rtl;"> <tbody>  <tr>   <td style="font-family:tahoma;"><strong>&nbsp;{MEMBER_NAME} عزیز</strong></td>  </tr>  <tr>   <td style="font-family:tahoma;">   <div style="font-family:tahoma;">با تشکر از شما بابت ارسال تبلیغات در&nbsp; سایت {site_name} . آگهی شما پس از بررسی توسط واحد تبلیغات&nbsp; {site_name}&nbsp;&nbsp;نمایش داده خواهد شد.</div>   <br>   <a href="{LINK_CLASSIFIED}">{LINK_CLASSIFIED}</a></td>  </tr> </tbody></table><p style="font-family:tahoma;direction:rtl"><br>با تشکر</p><p style="font-family:tahoma;direction:rtl">روابط عمومی سایت {site_name}&nbsp;<br>ایمیل:&nbsp; {admin_email}</p>','email_subject_fa' => '{site_name} آگهی ارسال شد در سایت','status' => '1','updated_on' => '2018-10-10 03:25:04'),
            array('id' => '24','email_section' => 'Lead Updation Mail','email_subject' => 'Lead updated at {site_name}','email_content' => '<table border="0" style="width:100%">

 <tbody>

  <tr>

   <td><strong>Dear {MEMBER_NAME}</strong></td>

  </tr>

  <tr>

   <td><br>
   Your lead {LEAD_NAME} has been de-activated due to some changes. It further needs admin approval. Click below link to view details:<br>
   <br>
   <a href="{LINK_CLASSIFIED}">{LINK_CLASSIFIED}</a></td>

  </tr>

 </tbody>

</table>


<p><br>
Thank you.<br>
{site_name} Customer Service<br>
Email: {admin_email}</p>','email_content_fa' => '<table border="0" style="width:100%;direction:rtl;"> <tbody>  <tr>   <td><strong>{MEMBER_NAME} عزیز</strong></td>  </tr>  <tr>   <td><br>   آگهی شما {LEAD_NAME} به دلیل ایجاد تغییرات غیرفعال گردید و نیاز ب تاییدیه مجدد ادمین است. برای مشاهده جزيیات روی لینک زیر کلیک کنید:<br>   <br>   <a href="{LINK_CLASSIFIED}">{LINK_CLASSIFIED}</a></td>  </tr> </tbody></table><p style="font-family:tahoma;direction:rtl"><br>با تشکر</p><p style="font-family:tahoma;direction:rtl">روابط عمومی سایت {site_name}&nbsp;<br>ایمیل:&nbsp; {admin_email}</p>','email_subject_fa' => '','status' => '1','updated_on' => '2018-08-24 13:23:52'),
            array('id' => '25','email_section' => 'Membership Notification Email','email_subject' => 'ایمیل عضویت {site_name}','email_content' => '<table border="0" style="width:100%">
 <tbody>
  <tr>
   <td><strong>Dear {MEMBER_NAME}</strong></td>
  </tr>
  <tr>
   <td><br>
   We are getting enquiries on your leads but you do not have our membership plan. for receving enquiry directly please take our membership plan.</td>
  </tr>
 </tbody>
</table>

<p><br>
Thank you.<br>
{site_name} Customer Service<br>
Email: {admin_email}</p>','email_content_fa' => '<table border="0" style="width:100%;direction:rtl;"> <tbody>  <tr>   <td style="font-family:tahoma;"><strong> {MEMBER_NAME} عزیز</strong></td>  </tr>  <tr>   <td style="font-family:tahoma;"><br>ما پیشنهادی درخصوص آگهی ثبت شده شما در سایت بایسل یاب دریافت کرده ایم&nbsp; اما شما جزو عضویت های ویژه وب سایت نیستید . برای دریافت مستقیم پیشنهادات ارسال شده&nbsp; لطفا یکی از طرح های عضویت ما را انتخاب نمایید .</td></tr></tbody></table><p style="font-family:tahoma;direction:rtl"><br>با تشکر</p><p style="font-family:tahoma;direction:rtl">روابط عمومی سایت {site_name}&nbsp;<br>ایمیل:&nbsp; {admin_email}</p>','email_subject_fa' => 'عضویت با موفقیت به روز شد {site_name}','status' => '1','updated_on' => '2018-10-10 03:50:53'),
            array('id' => '26','email_section' => 'NewsLetter New User','email_subject' => 'New user subscribed for newsletter','email_content' => '<table border="0" style="width:100%">

						 <tbody>

						  <tr>

						   <td colspan="2"><strong>Dear Admin</strong></td>

						  </tr>

						  <tr>

						   <td colspan="2"><br>						     
						     A new user registered for newsletter details are as follows<br>
						  </td>

						  </tr>

						  <tr>

						   <td width="27%">Name:</td>
<td width="73%">{subscriber_name}</td>

						  </tr>

						  <tr>

						   <td>Email:</td>
<td>{subscriber_email}</td>

						  </tr>

						 </tbody>

						</table>

						
						<p><br>
						Thank you.<br>
						{site_name} Customer Service<br>
						Email: {admin_email}</p>','email_content_fa' => '<table border="0" style="width:100%;direction:rtl;">						 <tbody>						  <tr>						   <td colspan="2"><span style="font-weight: 700;">ادمین عزیز</span></td>						  </tr>						  <tr>						   <td colspan="2"><br>						     						     کاربر جدید ثبت شده برای خبرنامه به شرح زیر است:<br>						  </td>						  </tr>						  <tr>						   <td width="27%"><table border="0" style="width: 745px;"><tbody><tr><td width="27%">نام :</td><td width="73%">{subscriber_name}</td></tr><tr><td>ایمیل :</td><td>{subscriber_email}</td></tr></tbody></table></td><td width="73%"><br></td></tr></tbody></table><p style="font-family:tahoma;direction:rtl"><br>با تشکر</p><p style="font-family:tahoma;direction:rtl">روابط عمومی سایت {site_name}&nbsp;<br>ایمیل:&nbsp; {admin_email}</p>','email_subject_fa' => 'کاربر جدید برای خبرنامه مشترک شده است','status' => '1','updated_on' => '2018-08-24 13:26:32'),
            array('id' => '27','email_section' => 'NewsLetter New User for user','email_subject' => 'subscribed for newsletter','email_content' => '<table border="0" style="width:100%">

						 <tbody>

						  <tr>

						   <td colspan="2"><strong>Dear </strong>{subscriber_name}<strong><br></strong></td>

						  </tr>

						  <tr>

						   <td colspan="2"><p><br>welcome to newsletter buysellyab</p>

<p>for deactivate subscriber click link button:</p>

<p><a href="{link_unsubscriber}" target="_blank">deactivate subscriber</a><br></p>

</td>

</tr>

						 </tbody>

						</table>

												<p><br>						Thank you.<br>						{site_name} Customer Service<br>						Email: {admin_email}</p>','email_content_fa' => '<table border="0" style="width:100%;direction:rtl;">						 <tbody>						  <tr>						   <td colspan="2">{subscriber_name}<strong style="background-color: transparent;"></strong><strong><br></strong></td>						  </tr>						  <tr>						   <td colspan="2"><p><br>به خبرنامه سایت&nbsp;<span style="background-color: transparent;">{site_name} خوش آمدید.</span></p><p>برای لغو عضویت روی لینک زیر کلیک کنید:</p><p><a href="{link_unsubscriber}" target="_blank">لغو اشتراک</a><br></p></td></tr>						 </tbody>						</table>											<p style="font-family:tahoma;direction:rtl"><br>با تشکر</p><p style="font-family:tahoma;direction:rtl">روابط عمومی سایت {site_name}&nbsp;<br>ایمیل:&nbsp; {admin_email}</p>','email_subject_fa' => 'مشترک خبرنامه شدید','status' => '1','updated_on' => '2018-08-29 10:36:21'),
            array('id' => '28','email_section' => 'NewsLetter unsubscribed User for user','email_subject' => 'unsubscribed for newsletter','email_content' => '<table border="0" style="width:100%">

						 <tbody>

						  <tr>

						   <td colspan="2"><p><strong>Dear </strong>{subscriber_name}</p><p><strong style="background-color: transparent;"></strong><strong><br></strong></p></td>

						  </tr>

						  <tr>

						   <td colspan="2"><p>Your newsletter has been disabled.<br></p>

</td>

</tr>

						 </tbody>

						</table>

												<p><br>						Thank you.<br>						{site_name} Customer Service<br>						Email: {admin_email}</p>','email_content_fa' => '<table border="0" style="width:100%;direction:rtl;">						 <tbody>						  <tr>						   <td style="font-family:tahoma;" colspan="2"><strong>کاربر عزیز&nbsp;</strong>{subscriber_name}<strong style="background-color: transparent;"></strong><strong><br></strong></td>						  </tr>						  <tr>						   <td style="font-family:tahoma;" colspan="2"><p><br>خبر نامه شما غیر فعال گردید.</p></td></tr>						 </tbody>						</table><p style="font-family:tahoma;direction:rtl"><br>با تشکر</p><p style="font-family:tahoma;direction:rtl">روابط عمومی سایت {site_name}&nbsp;<br>ایمیل:&nbsp; {admin_email}</p>','email_subject_fa' => ' خبرنامه شما لغو گردید','status' => '1','updated_on' => '2018-08-30 17:14:39'),
            array('id' => '29','email_section' => 'NewsLetter unsubscribed User','email_subject' => 'user unsubscribed for newsletter','email_content' => '<table border="0" style="width:100%">

						 <tbody>

						  <tr>

						   <td colspan="2"><strong>Dear Admin</strong></td>

						  </tr>

						  <tr>

						   <td colspan="2"><br>						     
						     A user unsubscribed for newsletter details are as follows<br>
						  </td>

						  </tr>

						  <tr>

						   <td width="27%">Name:</td>
<td width="73%">{subscriber_name}</td>

						  </tr>

						  <tr>

						   <td>Email:</td>
<td>{subscriber_email}</td>

						  </tr>

						 </tbody>

						</table>

						
						<p><br>
						Thank you.<br>
						{site_name} Customer Service<br>
						Email: {admin_email}</p>','email_content_fa' => '<table border="0" style="width:100%;direction:rtl;">						 <tbody>						  <tr>						   <td style="font-family:tahoma;" colspan="2"><span style="font-weight: 700;">ادمین عزیز</span></td>						  </tr>						  <tr>						   <td style="font-family:tahoma;" colspan="2"><br>یک کاربر با مشخصات زیر در قسمت اشتراک در خبرنامه غیرفعال شد.<br>						  </td>						  </tr>						  <tr>						   <td style="font-family:tahoma;" width="27%"><table border="0" style="width: 745px;"><tbody><tr><td style="font-family:tahoma;direction:rtl" width="27%">نام:</td><td style="font-family:tahoma;" width="73%">{subscriber_name}</td></tr><tr><td style="font-family:tahoma;direction:rtl">ایمیل :</td><td>{subscriber_email}</td></tr></tbody></table></td><td style="font-family:tahoma;direction:rtl" width="73%"><br></td></tr></tbody></table><p style="font-family:tahoma;direction:rtl"><br>با تشکر</p><p style="font-family:tahoma;direction:rtl">روابط عمومی سایت {site_name}&nbsp;<br>ایمیل:&nbsp; {admin_email}</p>','email_subject_fa' => 'کاربر لغو اشتراک خبرنامه شده است','status' => '1','updated_on' => '2018-08-24 13:34:01'),
            array('id' => '30','email_section' => 'Membership User Email','email_subject' => 'Membership upgraded successfully {site_name}','email_content' => '<table border="0" style="width:100%">
				 <tbody>
				  <tr>
				   <td><strong>Dear {fullName}</strong></td>
				  </tr>
				  <tr>
				   <td><br>
				   Your membership successfully upgraded, details are as follows.<br>
				   
				   <table width="448" style="margin-top:20px;">
				   <tbody><tr>
				   <td width="256">Membership Name</td>
				   <td width="180">{plan_name}</td>
				   </tr>
				   <tr>
				   <td>Enquiry Received Limit</td>
				   <td>{no_of_enquiry}</td>
				   </tr>
				   <tr>
				   <td>Expire Date</td>
				   <td>{exp_date}</td>
				   </tr>
				   <tr>
				   <td>Price</td>
				   <td>{price}</td>
				   </tr>
				   </tbody></table>
				   
				   </td>
				  </tr>
				 </tbody>
				</table>
				
				<p><br>
				Thank you.<br>
				{site_name} Customer Service<br>
				Email: {admin_email}</p>
				','email_content_fa' => '<table border="0" style="width:100%;direction:rtl;">				 <tbody>				  <tr>				   <td style="font-family:tahoma;"><strong> {fullName} عزیز</strong></td>				  </tr>				  <tr>				   <td style="font-family:tahoma;"><br>				   عضویت شما به طور موفقیت آمیز ارتقا داده شده است، جزئیات به شرح زیر است.<br>				   				   <table width="448" style="margin-top:20px;directiom:rtl;">				   <tbody><tr>				   <td style="font-family:tahoma;" width="256">نام عضویت</td>				   <td style="font-family:tahoma;" width="180">{plan_name}</td>				   </tr>				   <tr>				   <td style="font-family:tahoma;">درخواست محدودیت دریافت شده</td>				   <td style="font-family:tahoma;">{no_of_enquiry}</td>				   </tr>				   <tr>				   <td style="font-family:tahoma;">تاریخ انقضا</td>				   <td style="font-family:tahoma;">{exp_date}</td>				   </tr>				   <tr>				   <td style="font-family:tahoma;">قیمت</td>				   <td style="font-family:tahoma;">{price}</td>				   </tr>				   </tbody></table>				   				   </td>				  </tr>				 </tbody>				</table>								<p style="font-family:tahoma;direction:rtl;"><br>با تشکر از شما.<br>				{site_name} سرویس خدمات<br>				ایمیل: {admin_email}</p>','email_subject_fa' => 'عضویت با موفقیت به روز شد {site_name}','status' => '1','updated_on' => '2018-08-24 13:36:14'),
            array('id' => '31','email_section' => 'Membership Admin Email','email_subject' => 'New Membership {site_name}','email_content' => '<table border="0" style="width:100%">
				 <tbody>
				  <tr>
				   <td><strong>Add {fullName}</strong></td>
				  </tr>
				  <tr>
				   <td><br />
				   Your membership successfully upgraded, details are as follows.<br />
				   
				   <table width="448" style="margin-top:20px;">
				   <tr>
				   <td width="256">Membership Name</td>
				   <td width="180">{plan_name}</td>
				   </tr>
				   <tr>
				   <td>Enquiry Received Limit</td>
				   <td>{no_of_enquiry}</td>
				   </tr>
				   <tr>
				   <td>Expire Date</td>
				   <td>{exp_date}</td>
				   </tr>
				   <tr>
				   <td>Price</td>
				   <td>{price}</td>
				   </tr>
				   </table>
				   
				   </td>
				  </tr>
				 </tbody>
				</table>
				
				<p><br />
				Thank you.<br />
				{site_name} Customer Service<br />
				Email: {admin_email}</p>
				','email_content_fa' => '<table border="0" style="width:100%">
				 <tbody>
				  <tr>
				   <td><strong> {fullName} عزیز</strong></td>
				  </tr>
				  <tr>
				   <td><br />
				   
عضویت شما به طور موفقیت آمیز ارتقا داده شده است، جزئیات به شرح زیر است.<br />
				   
				   <table width="448" style="margin-top:20px;">
				   <tr>
				   <td width="256">نام عضویت</td>
				   <td width="180">{plan_name}</td>
				   </tr>
				   <tr>
				   <td>درخواست محدودیت دریافت شده</td>
				   <td>{no_of_enquiry}</td>
				   </tr>
				   <tr>
				   <td>تاریخ انقضا</td>
				   <td>{exp_date}</td>
				   </tr>
				   <tr>
				   <td>قیمت</td>
				   <td>{price}</td>
				   </tr>
				   </table>
				   
				   </td>
				  </tr>
				 </tbody>
				</table>
				
				<p><br />
متشکر از شما.<br />
				{site_name} سرویس خدمات<br />
				ایمیل: {admin_email}</p>
				','email_subject_fa' => 'عضویت جدید {site_name}
','status' => '1','updated_on' => '2015-12-03 12:51:12'),
            array('id' => '32','email_section' => 'Deactivate','email_subject' => 'Welcome again To {site_name}','email_content' => '<table style="width:100%" border="0">
    <tbody>
    <tr>
        <td style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top" align="center">           <table id="templateHeader" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FFFFFF;border-top: 0;border-bottom: 0;" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tbody>
                <tr>
                    <td style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top" align="center">                        <table class="templateContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="600" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                            <tr>
                                <td class="headerContainer" style="padding-top: 10px;padding-bottom: 10px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top">                                    <table class="mcnImageBlock" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                        <tbody class="mcnImageBlockOuter">
                                        <tr>
                                            <td class="mcnImageBlockInner" style="padding: 9px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top">                                                <table class="mcnImageContentContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
                                                    <tbody>
                                                    <tr>
                                                        <td class="mcnImageContent" style="padding-right: 9px;padding-left: 9px;padding-top: 0;padding-bottom: 0;text-align: center;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top">                                                            <img alt="" class="mcnImage" src="https://worldbtob.com/mails/logo.png" style="max-width: 51px;padding-bottom: 0;display: inline !important;vertical-align: bottom;border: 0;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" width="51" align="middle">                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2"><strong>Hi ,</strong></td>
    </tr>
    <tr>
        <td colspan="2">We are happy to have you as the newest member of {site_name} !</td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr colspan="2">
        <td><p>Thank you for signing up for {site_name}! Just one small step before you get started. Click the button                below to verify your email address.</p>
        </td>
    </tr>
    <tr>
        <td class="mcnButtonContent" style="font-family: Tahoma, Verdana, Segoe, sans-serif;font-size: 20px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="middle" align="center"><a style="margin-top:20px; margin-bottom:20px; text-decoration: none; background: #1E89DA; border-radius: 3px; color: #fff; padding: 10px 30px; display: inline-block; cursor: pointer; border-bottom: 3px solid #1265A5" href="{link}"> Verify your email </a></td>
    </tr>
    <tr>
        <td colspan="2"><p>You signed up for {site_name} with your email <a href="\\" mailto:{email}\\""="" style="\\" word-wrap:"="" break-word;-ms-text-size-adjust:="" 100%;-webkit-text-size-adjust:="" 100%;color:="" #000000;font-weight:="" normal;text-decoration:="" underline;\\"="">{email}</a> We’re sorry if it wasn’t                you. Just ignore this email.</p>
            <p>We hope you will visit us again soon and put these special services to work foryou.</p>
            Please feel free to contact us if you have any questions at all.        </td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2">Thank you.<br> {site_name} Customer Service<br> Email: <a href="mailto:{admin_email}" style="word-wrap: break-word;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #000000;font-weight: normal;text-decoration: underline;">{admin_email}</a><br>            <img src="https://worldbtob.com/mails/signature.gif" style="width: 109px;height: 41px;margin: 0px;border: 0;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" width="109" height="41" align="none"><br></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align:center">© 2015 {site_name}. All right reserved.</td>
    </tr>
    </tbody>
</table>','email_content_fa' => '<div style="text-align: right;direction:rtl;font-family:tahoma;">سلام</div><table border="0" style="text-align: right;direction:rtl;font-family:tahoma; width: 960px;"><tbody><tr><td style="font-family:tahoma;" colspan="2"><span style="font-weight: 700;">&nbsp;</span></td></tr><tr><td style="font-family:tahoma;" colspan="2">ما خوشحالیم که شما را به عنوان تازه ترین عضو از سایت {site_name} هستید !</td></tr><tr><td style="font-family:tahoma;" colspan="2">&nbsp;</td></tr><tr colspan="2"><td style="font-family:tahoma;"><p>با تشکر از شما برای ثبت نام {site_name}! فقط یک قدم کوچک قبل از اینکه شروع کنید. برای تأیید آدرس ایمیل خود، روی دکمه زیر کلیک کنید.</p></td></tr><tr><td style="font-family:tahoma;" class="mcnButtonContent" valign="middle" align="center"><h3><h4><a href="{link}" style="background: rgb(30, 137, 218); color: rgb(255, 255, 255); margin-top: 20px; margin-bottom: 20px; border-radius: 3px; padding: 10px 30px; display: inline-block; border-bottom: 3px solid rgb(18, 101, 165);">ایمیل خود را تایید کنید&nbsp;</a></h4></h3></td></tr><tr><td style="font-family:tahoma;" colspan="2"><p style="text-align: right; ">شما&nbsp; در سایت {site_name} با ایمیل<a href="https://b2b.worldbtob.com/" mailto:{email}\\""="" word-wrap:"="" break-word;-ms-text-size-adjust:="" 100%;-webkit-text-size-adjust:="" 100%;color:="" #000000;font-weight:="" normal;text-decoration:="" underline;\\"="">{email}</a>&nbsp; ثبت نام کرده اید. اگر این درخواست از سمت شما نبوده است لطفا این ایمیل را نادیده بگیرید.</p><p style="text-align: right;font-family:tahoma; ">ما امیدواریم که به زودی از سایت ما بازدید خواهید کرد و این خدمات ویژه را برای کار شما آماده می کنیم.</p><div style="text-align: right;font-family:tahoma;"><span style="background-color: transparent;">لطفا در صورت بروز هر گونه سؤال، لطفا با ما تماس بگیرید.</span></div></td></tr><tr><td colspan="2" style="text-align: right;">&nbsp;</td></tr><tr><td colspan="2"><div style="text-align: right;"><span style="background-color: transparent;">تشکر از شما.</span></div><div style="text-align: right;"><span style="background-color: transparent; font-family: tahoma;">&nbsp;</span><span style="background-color: transparent; font-family: tahoma;">روابط عمومی سایت&nbsp;</span><span style="background-color: transparent;">{site_name}</span></div><div style="text-align: right;"><span style="background-color: transparent;">ایمیل:&nbsp;</span><a href="mailto:%7Badmin_email%7D" style="color: rgb(0, 0, 0); text-decoration-line: underline; word-wrap: break-word; text-size-adjust: 100%;">{admin_email}</a></div><div style="text-align: right;"><br></div></td></tr><tr><td colspan="2" style="text-align: center;"><br></td></tr></tbody></table>','email_subject_fa' => '{site_name}خوش آمدین  دوباره به سایت','status' => '1','updated_on' => '2018-08-24 13:40:12'),
            array('id' => '33','email_section' => 'RplayEnquiryProduct','email_subject' => 'Replay   {product_name}','email_content' => '<table style="width:100%" border="0">
    <tbody>
    <tr>
        <td style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top" align="center">           <table id="templateHeader" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FFFFFF;border-top: 0;border-bottom: 0;" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tbody>
                <tr>
                    <td style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top" align="center">                        <table class="templateContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="600" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                            <tr>
                                <td class="headerContainer" style="padding-top: 10px;padding-bottom: 10px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top">                                    <table class="mcnImageBlock" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                        <tbody class="mcnImageBlockOuter">
                                        <tr>
                                            <td class="mcnImageBlockInner" style="padding: 9px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top">                                                <table class="mcnImageContentContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
                                                    <tbody>
                                                    <tr>
                                                        <td class="mcnImageContent" style="padding-right: 9px;padding-left: 9px;padding-top: 0;padding-bottom: 0;text-align: center;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top">                                                            <img alt="" class="mcnImage" src="https://worldbtob.com/mails/logo.png" style="max-width: 51px;padding-bottom: 0;display: inline !important;vertical-align: bottom;border: 0;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" width="51" align="middle">                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2"><strong>Hi ,</strong></td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;{site_name} !</td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;: By the product owner {product_name} your question regarding the product is answered</td>
</tr>
<tr colspan="2">
<td><h3><span style="background-color: rgb(255, 239, 198);">{comment}</span></h3>
</td>
</tr>
    <tr>
        <td colspan="2"><p>You Asked for {site_name} with your email <a href="\\" mailto:{email}\\""="" style="\\" word-wrap:"="" break-word;-ms-text-size-adjust:="" 100%;-webkit-text-size-adjust:="" 100%;color:="" #000000;font-weight:="" normal;text-decoration:="" underline;\\"="">{email}</a> We’re sorry if it wasn’t                you. Just ignore this email.</p>
            <p>We hope you will visit us again soon and put these special services to work foryou.</p>
            Please feel free to contact us if you have any questions at all.        </td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2">Thank you.<br> {site_name} Customer Service<br> Email: <a href="mailto:{admin_email}" style="word-wrap: break-word;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #000000;font-weight: normal;text-decoration: underline;">{admin_email}</a><br>            <img src="https://worldbtob.com/mails/signature.gif" style="width: 109px;height: 41px;margin: 0px;border: 0;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" width="109" height="41" align="none"><br></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align:center">© 2015 {site_name}. All right reserved.</td>
    </tr>
    </tbody>
</table>','email_content_fa' => '<div style="text-align: right;direction:rtl;">سلام</div><table border="0" style="text-align: right;;direction:rtl; width: 960px;"><tbody><tr><td style="font-family:tahoma;" colspan="2"><span style="font-weight: 700;">&nbsp;</span></td></tr><tr><td style="font-family:tahoma;" colspan="2"><p><span style="font-family: tahoma; background-color: transparent;">پاسخ سوال شما در ارتباط با محصول</span>&nbsp; &nbsp;<span style="background-color: transparent;">{product_name}&nbsp;&nbsp;</span><span style="font-family: tahoma; background-color: transparent;">توسط&nbsp; صاحب&nbsp; محصول:</span></p></td></tr><tr><td style="font-family:tahoma;" colspan="2">&nbsp;</td></tr><tr colspan="2"><td style="font-family:tahoma;"><h3><span style="background-color: rgb(255, 239, 198);">{comment}</span></h3></td></tr><tr><td style="font-family:tahoma;" colspan="2"><p style="text-align: right; ">&nbsp;با ایمیل شما در سایت &nbsp;{site_name}&nbsp; شما<span style="font-family: tahoma; background-color: transparent;">&nbsp;سوالی انجام گردید.</span></p><p style="text-align: right; "><span style="background-color: transparent;">&nbsp;</span><span style="background-color: transparent;">اگر این درخواست از سمت شما نبوده است این ایمیل را نادیده بگیرید.</span><a href="https://b2b.worldbtob.com/" mailto:{email}\\""="" word-wrap:"="" break-word;-ms-text-size-adjust:="" 100%;-webkit-text-size-adjust:="" 100%;color:="" #000000;font-weight:="" normal;text-decoration:="" underline;\\"="" style="background-color: rgb(255, 255, 255);">{email}</a><span style="background-color: transparent;">&nbsp; &nbsp;</span></p><p style="text-align: right;font-family:tahoma; ">ما امیدواریم که به زودی از ما بازدید خواهید کرد و این خدمات ویژه را برای کار شما آماده می کنیم.</p><div style="text-align: right;font-family:tahoma;"><span style="background-color: transparent;">لطفا در صورت بروز هر گونه سؤال، لطفا با ما تماس بگیرید.</span></div></td></tr><tr><td style="font-family:tahoma;" colspan="2">&nbsp;</td></tr><tr><td style="font-family:tahoma;" colspan="2"><div style="text-align: right;"><span style="background-color: transparent;">تشکر از شما.</span></div><div style="text-align: right;font-family:tahoma;direction:rtl;"><span style="font-family: tahoma; background-color: transparent;">روابط عمومی سایت&nbsp;</span><span style="background-color: transparent;">{site_name}</span></div><div style="text-align: right;font-family:tahoma;direction:rtl;"><span style="background-color: transparent;">ایمیل:&nbsp;</span><a href="mailto:%7Badmin_email%7D" style="color: rgb(0, 0, 0); text-decoration-line: underline; word-wrap: break-word; text-size-adjust: 100%;">{admin_email}</a></div><div style="text-align: right;font-family:tahoma;direction:rtl;"><br></div></td></tr><tr><td style="font-family:tahoma;direction:rtl;" colspan="2"><br></td></tr></tbody></table>','email_subject_fa' => '  پاسخ  {product_name} ','status' => '1','updated_on' => '2018-08-24 13:45:40'),
            array('id' => '34','email_section' => 'Remove User','email_subject' => 'GoodBye site {site_name}','email_content' => 'Hello<table style="width:100%" border="0"></table>&nbsp;<table style="width:100%" border="0"></table>We are glad you were a member of our <a href="{site_link}">{site_name}</a> site!<table style="width:100%" border="0"></table>&nbsp;<table style="width:100%" border="0"></table>Due to your inactivity at <a href="{site_link}">{site_name}</a>, your username was deleted from the site.<table style="width:100%" border="0"></table><br><table style="width:100%" border="0"></table><br><table style="width:100%" border="0"></table>You are sorry to delete the<a href="{site_link}">{site_name}</a> site by email {email}. If you did not, just ignore this email.<table style="width:100%" border="0"></table><br><table style="width:100%" border="0"></table>We hope that we will be visiting you soon and will prepare these special services for your work.<table style="width:100%" border="0"></table><br><table style="width:100%" border="0"></table>Please contact us if you have any questions.<table style="width:100%" border="0"></table>&nbsp;<table style="width:100%" border="0"></table>thank you.<table style="width:100%" border="0"></table>{site_name} public relations site<table style="width:100%" border="0"></table>Email:<a href="mailto:{admin_email}" style="word-wrap: break-word;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #000000;font-weight: normal;text-decoration: underline;">{admin_email}</a><table style="width:100%" border="0"></table><br><table style="width:100%" border="0"></table><div style="text-align: center;"><br>© 2015 <a href="{site_link}">{site_name}</a>. All right reserved.</div>','email_content_fa' => '<div style="text-align: right;direction:rtl;font-family:tahoma;"><div style="text-align: right;direction:rtl;"><br></div>    <div style="text-align: right;direction:rtl;font-family:tahoma;">سلام</div>    <div style="text-align: right;">&nbsp;</div>    <div style="text-align: right;direction:rtl;font-family:tahoma;">ما خوشحالیم که شما عضو سایت    <a href="{site_link}">{site_name}</a>&nbsp;ما بودید!</div>    <div style="text-align: right;font-family:tahoma;direction:rtl;"><br></div><div style="text-align: right;font-family:tahoma;direction:rtl;">با توجه به عدم فعالیت شما در      <a href="{site_link}">{site_name}</a>&nbsp;اطلاعات کاربری شما از سایت حذف گردید.</div>    <div style="text-align: right;"><br></div>    <div style="text-align: right;font-family:tahoma;direction:rtl;">ما امیدواریم که به زودی از ما بازدید خواهید کرد و از خدمات ویژه برای کار شما آماده می کنیم.<br></div>    <div style="text-align: right;"><br></div>    <div style="text-align: right;font-family:tahoma;direction:rtl;">لطفا در صورت بروز هر گونه سؤال، لطفا با ما تماس بگیرید.</div>    <div style="text-align: right;">&nbsp;</div>    <div style="text-align: right;font-family:tahoma;direction:rtl;">تشکر از شما</div>    <div style="text-align: right;font-family:tahoma;direction:rtl;"><br></div><div style="text-align: right;">&nbsp;روابط عمومی سایت&nbsp; &nbsp;<a href="http://b2b.worldbtob.com/admin/mailcontents/edit/%7Bsite_link%7D" style="background-color: rgb(255, 255, 255);">{site_name}</a>&nbsp;&nbsp;</div>    <div style="text-align: right;font-family:tahoma;direction:rtl;">&nbsp;ایمیل&nbsp; :&nbsp;&nbsp;<a href="mailto:{admin_email}" style="word-wrap: break-word;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #000000;font-weight: normal;text-decoration: underline;">{admin_name}</a></div><div style="text-align: right;"><table border="0" style="font-family: tahoma; background-color: rgb(255, 255, 255); text-align: center; width: 100%; direction: rtl;"><tbody><tr style="background-color: transparent;"><td colspan="2"></td></tr><tr style="background-color: transparent;"><td colspan="2"></td></tr><tr style="background-color: transparent;"><td colspan="2"></td></tr><tr colspan="2" style="background-color: transparent;"><td></td></tr><tr style="background-color: transparent;"><td class="mcnButtonContent" valign="middle" align="center" style="font-family: Tahoma, Verdana, Segoe, sans-serif; font-size: 20px; text-size-adjust: 100%;"></td></tr><tr style="background-color: transparent;"><td colspan="2"></td></tr><tr style="background-color: transparent;"><td colspan="2"></td></tr><tr style="background-color: transparent;"><td colspan="2"></td></tr><tr style="background-color: transparent;"></tr></tbody></table></div></div>','email_subject_fa' => '{site_name} خداحافظ سایت','status' => '1','updated_on' => '2018-08-24 13:49:08'),
            array('id' => '35','email_section' => 'Active User','email_subject' => 'Active user in  site {site_name}','email_content' => 'Hello<table style="width:100%" border="0"></table>&nbsp;<table style="width:100%" border="0"></table>We are glad you were a member of our <a href="{site_link}">{site_name}</a> site!<table style="width:100%" border="0"></table>&nbsp;<table style="width:100%" border="0"></table>Due to your inactivity at <a href="{site_link}">{site_name}</a>, your username was deleted from the site.<table style="width:100%" border="0"></table><br><table style="width:100%" border="0"></table><br><table style="width:100%" border="0"></table>You are sorry to delete the<a href="{site_link}">{site_name}</a> site by email {email}. If you did not, just ignore this email.<table style="width:100%" border="0"></table><br><table style="width:100%" border="0"></table>We hope that we will be visiting you soon and will prepare these special services for your work.<table style="width:100%" border="0"></table><br><table style="width:100%" border="0"></table>Please contact us if you have any questions.<table style="width:100%" border="0"></table>&nbsp;<table style="width:100%" border="0"></table>thank you.<table style="width:100%" border="0"></table>{site_name} public relations site<table style="width:100%" border="0"></table>Email:<a href="mailto:{admin_email}" style="word-wrap: break-word;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #000000;font-weight: normal;text-decoration: underline;">{admin_email}</a><table style="width:100%" border="0"></table><br><table style="width:100%" border="0"></table><div style="text-align: center;"><br>© 2015 <a href="{site_link}">{site_name}</a>. All right reserved.</div>','email_content_fa' => '<div style="text-align: right;direction:rtl;font-family:tahoma;"><div style="text-align: right;direction:rtl;"><br></div>    <div style="text-align: right;direction:rtl;font-family:tahoma;">سلام</div>    <div style="text-align: right;">&nbsp;</div>    <div style="text-align: right;direction:rtl;font-family:tahoma;">ما خوشحالیم که شما عضو سایت    <a href="{site_link}">{site_name}</a>&nbsp;ما بودید!</div>    <div style="text-align: right;font-family:tahoma;direction:rtl;"><br></div><div style="text-align: right;font-family:tahoma;direction:rtl;">با توجه به عدم فعالیت شما در      <a href="{site_link}">{site_name}</a>&nbsp;اطلاعات کاربری شما از سایت حذف گردید.</div>    <div style="text-align: right;"><br></div>    <div style="text-align: right;font-family:tahoma;direction:rtl;">ما امیدواریم که به زودی از ما بازدید خواهید کرد و از خدمات ویژه برای کار شما آماده می کنیم.<br></div>    <div style="text-align: right;"><br></div>    <div style="text-align: right;font-family:tahoma;direction:rtl;">لطفا در صورت بروز هر گونه سؤال، لطفا با ما تماس بگیرید.</div>    <div style="text-align: right;">&nbsp;</div>    <div style="text-align: right;font-family:tahoma;direction:rtl;">تشکر از شما</div>    <div style="text-align: right;font-family:tahoma;direction:rtl;"><br></div><div style="text-align: right;">&nbsp;روابط عمومی سایت&nbsp; &nbsp;<a href="http://b2b.worldbtob.com/admin/mailcontents/edit/%7Bsite_link%7D" style="background-color: rgb(255, 255, 255);">{site_name}</a>&nbsp;&nbsp;</div>    <div style="text-align: right;font-family:tahoma;direction:rtl;">&nbsp;ایمیل&nbsp; :&nbsp;&nbsp;<a href="mailto:{admin_email}" style="word-wrap: break-word;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #000000;font-weight: normal;text-decoration: underline;">{admin_name}</a></div><div style="text-align: right;"><table border="0" style="font-family: tahoma; background-color: rgb(255, 255, 255); text-align: center; width: 100%; direction: rtl;"><tbody><tr style="background-color: transparent;"><td colspan="2"></td></tr><tr style="background-color: transparent;"><td colspan="2"></td></tr><tr style="background-color: transparent;"><td colspan="2"></td></tr><tr colspan="2" style="background-color: transparent;"><td></td></tr><tr style="background-color: transparent;"><td class="mcnButtonContent" valign="middle" align="center" style="font-family: Tahoma, Verdana, Segoe, sans-serif; font-size: 20px; text-size-adjust: 100%;"></td></tr><tr style="background-color: transparent;"><td colspan="2"></td></tr><tr style="background-color: transparent;"><td colspan="2"></td></tr><tr style="background-color: transparent;"><td colspan="2"></td></tr><tr style="background-color: transparent;"></tr></tbody></table></div></div>','email_subject_fa' => '{site_name}فعال شدن کاربر در سایت','status' => '1','updated_on' => '2018-08-24 13:49:58'),
            array('id' => '36','email_section' => 'DeActive User','email_subject' => 'DeActive User in  {site_name}','email_content' => 'Hello<table style="width:100%" border="0"></table>&nbsp;<table style="width:100%" border="0"></table>We are glad you were a member of our <a href="{site_link}">{site_name}</a> site!<table style="width:100%" border="0"></table>&nbsp;<table style="width:100%" border="0"></table>Due to your inactivity at <a href="{site_link}">{site_name}</a>, your username was deleted from the site.<table style="width:100%" border="0"></table><br><table style="width:100%" border="0"></table><br><table style="width:100%" border="0"></table>You are sorry to delete the<a href="{site_link}">{site_name}</a> site by email {email}. If you did not, just ignore this email.<table style="width:100%" border="0"></table><br><table style="width:100%" border="0"></table>We hope that we will be visiting you soon and will prepare these special services for your work.<table style="width:100%" border="0"></table><br><table style="width:100%" border="0"></table>Please contact us if you have any questions.<table style="width:100%" border="0"></table>&nbsp;<table style="width:100%" border="0"></table>thank you.<table style="width:100%" border="0"></table>{site_name} public relations site<table style="width:100%" border="0"></table>Email:<a href="mailto:{admin_email}" style="word-wrap: break-word;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #000000;font-weight: normal;text-decoration: underline;">{admin_email}</a><table style="width:100%" border="0"></table><br><table style="width:100%" border="0"></table><div style="text-align: center;"><br>© 2015 <a href="{site_link}">{site_name}</a>. All right reserved.</div>','email_content_fa' => '<div style="text-align: right;direction:rtl;font-family:tahoma;"><div style="text-align: right;direction:rtl;"><br></div>    <div style="text-align: right;direction:rtl;font-family:tahoma;">سلام</div>    <div style="text-align: right;">&nbsp;</div>    <div style="text-align: right;direction:rtl;font-family:tahoma;">ما خوشحالیم که شما عضو سایت    <a href="{site_link}">{site_name}</a>&nbsp;ما بودید!</div>    <div style="text-align: right;font-family:tahoma;direction:rtl;"><br></div><div style="text-align: right;font-family:tahoma;direction:rtl;">با توجه به عدم فعالیت شما در      <a href="{site_link}">{site_name}</a>&nbsp;اطلاعات کاربری شما از سایت حذف گردید.</div>    <div style="text-align: right;"><br></div>    <div style="text-align: right;font-family:tahoma;direction:rtl;">ما امیدواریم که به زودی از ما بازدید خواهید کرد و از خدمات ویژه برای کار شما آماده می کنیم.<br></div>    <div style="text-align: right;"><br></div>    <div style="text-align: right;font-family:tahoma;direction:rtl;">لطفا در صورت بروز هر گونه سؤال، لطفا با ما تماس بگیرید.</div>    <div style="text-align: right;">&nbsp;</div>    <div style="text-align: right;font-family:tahoma;direction:rtl;">تشکر از شما</div>    <div style="text-align: right;font-family:tahoma;direction:rtl;"><br></div><div style="text-align: right;">&nbsp;روابط عمومی سایت&nbsp; &nbsp;<a href="http://b2b.worldbtob.com/admin/mailcontents/edit/%7Bsite_link%7D" style="background-color: rgb(255, 255, 255);">{site_name}</a>&nbsp;&nbsp;</div>    <div style="text-align: right;font-family:tahoma;direction:rtl;">&nbsp;ایمیل&nbsp; :&nbsp;&nbsp;<a href="mailto:{admin_email}" style="word-wrap: break-word;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #000000;font-weight: normal;text-decoration: underline;">{admin_name}</a></div><div style="text-align: right;"><table border="0" style="font-family: tahoma; background-color: rgb(255, 255, 255); text-align: center; width: 100%; direction: rtl;"><tbody><tr style="background-color: transparent;"><td colspan="2"></td></tr><tr style="background-color: transparent;"><td colspan="2"></td></tr><tr style="background-color: transparent;"><td colspan="2"></td></tr><tr colspan="2" style="background-color: transparent;"><td></td></tr><tr style="background-color: transparent;"><td class="mcnButtonContent" valign="middle" align="center" style="font-family: Tahoma, Verdana, Segoe, sans-serif; font-size: 20px; text-size-adjust: 100%;"></td></tr><tr style="background-color: transparent;"><td colspan="2"></td></tr><tr style="background-color: transparent;"><td colspan="2"></td></tr><tr style="background-color: transparent;"><td colspan="2"></td></tr><tr style="background-color: transparent;"></tr></tbody></table></div></div>','email_subject_fa' => '{site_name} غیر فعال شدن در سایت','status' => '1','updated_on' => '2018-08-24 13:49:58')
        );
        foreach (array_chunk($tbl_auto_respond_mails, 250) as $set) {
            \App\TemplateMail::insert($set);
        }
    }
}
