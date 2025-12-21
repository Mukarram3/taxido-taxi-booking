<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification - JeConfie</title>
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; background-color: #f3f4f6; line-height: 1.6;">
<!-- Wrapper Table -->
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #f3f4f6; padding: 40px 0;">
    <tr>
        <td align="center" style="padding: 0 20px;">
            <!-- Main Container -->
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="max-width: 600px; margin: 0 auto;">

                <!-- Email Header -->
                <tr>
                    <td style="background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%); border-radius: 16px 16px 0 0; padding: 40px 30px; text-align: center;">
                        <!-- Logo -->
                        <div style="display: inline-block; width: 70px; height: 70px; background: rgba(255, 255, 255, 0.2); border-radius: 16px; line-height: 70px; text-align: center; margin-bottom: 20px;">
                            <span style="color: #ffffff; font-size: 28px; font-weight: 700;">JC</span>
                        </div>

                        <!-- Title -->
                        <h1 style="margin: 0 0 8px 0; color: #ffffff; font-size: 28px; font-weight: 700; letter-spacing: -0.5px;">
                            Welcome to JeConfie
                        </h1>

                        <!-- Subtitle -->
                        <p style="margin: 0; color: rgba(255, 255, 255, 0.95); font-size: 16px; font-weight: 400;">
                            Please verify your account
                        </p>
                    </td>
                </tr>

                <!-- Email Body -->
                <tr>
                    <td style="background-color: #ffffff; padding: 40px 30px;">
                        <!-- Greeting -->
                        <p style="margin: 0 0 24px 0; color: #1f2937; font-size: 16px; font-weight: 400;">
                            Dear User/Carrier,
                        </p>

                        <!-- Info Box -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: 0 0 30px 0;">
                            <tr>
                                <td style="background: rgba(6, 182, 212, 0.08); border-left: 4px solid #06b6d4; border-radius: 8px; padding: 20px;">
                                    <p style="margin: 0; color: #374151; font-size: 15px; line-height: 1.6;">
                                        Welcome to JeConfie! To start offering your transport services, please verify your email address by using the following verification code.
                                    </p>
                                </td>
                            </tr>
                        </table>

                        <!-- Verification Code Section -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: 0 0 30px 0;">
                            <tr>
                                <td style="text-align: center; padding: 30px 20px; background: #f8fafc; border-radius: 12px; border: 2px dashed #e5e7eb;">
                                    <p style="margin: 0 0 16px 0; color: #6b7280; font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">
                                        Your Verification Code
                                    </p>

                                    <!-- The Code -->
                                    <div style="display: inline-block; background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); padding: 16px 32px; border-radius: 12px; margin: 0 0 16px 0;">
                                            <span style="color: #ffffff; font-size: 36px; font-weight: 800; letter-spacing: 6px; font-family: 'Courier New', Courier, monospace;">
                                                {{ $code }}
                                            </span>
                                    </div>

                                    <p style="margin: 0; color: #ef4444; font-size: 13px; font-weight: 500;">
                                        ⏱️ This code will expire in 10 minutes
                                    </p>
                                </td>
                            </tr>
                        </table>

                        <!-- Instructions -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: 0 0 20px 0;">
                            <tr>
                                <td style="padding: 0;">
                                    <p style="margin: 0 0 12px 0; color: #374151; font-size: 14px; font-weight: 600;">
                                        📝 How to verify:
                                    </p>
                                    <ol style="margin: 0; padding-left: 20px; color: #6b7280; font-size: 14px; line-height: 1.8;">
                                        <li style="margin-bottom: 8px;">Return to the verification page</li>
                                        <li style="margin-bottom: 8px;">Enter the 6-digit code shown above</li>
                                        <li style="margin-bottom: 0;">Click "Verify Code" to complete</li>
                                    </ol>
                                </td>
                            </tr>
                        </table>

                        <!-- Security Note -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: 30px 0 0 0;">
                            <tr>
                                <td style="background: rgba(245, 158, 11, 0.08); border-left: 4px solid #f59e0b; border-radius: 8px; padding: 16px;">
                                    <p style="margin: 0; color: #92400e; font-size: 13px; line-height: 1.6;">
                                        <strong style="display: block; margin-bottom: 4px;">🔒 Security Notice:</strong>
                                        Never share this code with anyone. JeConfie will never ask for your verification code via phone or email.
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Email Footer -->
                <tr>
                    <td style="background-color: #f8fafc; border-radius: 0 0 16px 16px; padding: 30px; text-align: center; border-top: 1px solid #e5e7eb;">
                        <p style="margin: 0 0 16px 0; color: #6b7280; font-size: 13px; line-height: 1.6;">
                            If you didn't create this account, please ignore this email.<br>
                            The verification code expires in 10 minutes.
                        </p>

                        <!-- Divider -->
                        <div style="height: 1px; background: #e5e7eb; margin: 20px 0;"></div>

                        <!-- Footer Links -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: 0 0 16px 0;">
                            <tr>
                                <td align="center">
                                    <a href="#" style="color: #6366f1; text-decoration: none; font-size: 13px; margin: 0 12px; font-weight: 500;">Help Center</a>
                                    <span style="color: #d1d5db;">|</span>
                                    <a href="#" style="color: #6366f1; text-decoration: none; font-size: 13px; margin: 0 12px; font-weight: 500;">Privacy Policy</a>
                                    <span style="color: #d1d5db;">|</span>
                                    <a href="#" style="color: #6366f1; text-decoration: none; font-size: 13px; margin: 0 12px; font-weight: 500;">Contact Us</a>
                                </td>
                            </tr>
                        </table>

                        <!-- Copyright -->
                        <p style="margin: 0; color: #9ca3af; font-size: 12px;">
                            © 2024 JeConfie. All rights reserved.
                        </p>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</body>
</html>
