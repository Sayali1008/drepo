# import necessary packages
import email
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
from email.mime.base import MIMEBase
from email import encoders
import smtplib

# create message object instance
msg = MIMEMultipart()
password = ""
message = "Thank you"


def mail():
    # setup the parameters of the message

    # Enter Your Password
    password = ""
    # Enter Your Email ID
    msg['From'] = ""
    # Enter Receiver's Email ID
    msg['To'] = ""
    # Subject Of Email
    msg['Subject'] = "Backup"

    # File attach
    filename = 'blog.sql'
    attachemnt = open(filename, 'rb')

    part = MIMEBase('application', 'octet-stream')
    part.set_payload((attachemnt).read())
    # encoders.encode_base64(part)
    part.add_header('Content-Disposition', "attachemnt; filename"+filename)
    msg.attach(part)


# add in the message body
msg.attach(MIMEText(message, 'plain'))

# create server
server = smtplib.SMTP('smtp.gmail.com: 587')

server.starttls()

# Login Credentials for sending the mail
server.login(msg['From'], password)

# send the message via the server.
server.sendmail(msg['From'], msg['To'], msg.as_string())

server.quit()

# print "successfully sent email to %s:" %(msg['To'])
