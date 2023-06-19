  1. Create Google Sheet Form
2. Create Fields name same as you form
3. Extension->App Script->
4. Enter belwo scriopt in Code.gs : 

const scriptProp = PropertiesService.getScriptProperties();
function initialSetup() {
  const activeSpreadsheet = SpreadsheetApp.getActive();
  scriptProp.setProperty('key', activeSpreadsheet.getId());
}

function doGet(e) {
  const lock = LockService.getScriptLock();
  lock.tryLock(10000);

  try {
    const sheetName = e.parameter['sheet_name'];
    const doc = SpreadsheetApp.openById(scriptProp.getProperty('key'));
    const sheet = doc.getSheetByName(sheetName);

    const headers = sheet.getRange(1, 1, 1, sheet.getLastColumn()).getValues()[0];
    const newRow = [];
    
    const timeZone = "Asia/Kolkata";
    const now = new Date();
    const currentDate = Utilities.formatDate(now, timeZone, "dd-MM-yyyy");
    const hours = now.getHours();
    const minutes = now.getMinutes();
    const amPm = hours >= 12 ? "PM" : "AM";
    const formattedHours = hours % 12 || 12;
    const formattedMinutes = minutes.toString().padStart(2, "0");

    const formattedTime = `${formattedHours}:${formattedMinutes} ${amPm}`;
    const dateTime = `${currentDate} ${formattedTime}`;
    
	for (const header of headers) {
 	 newRow.push(header === 'Date_Time' ? dateTime : e.parameter[header]);
	}

    const nextRow = sheet.getLastRow() + 1;
    sheet.getRange(nextRow, 1, 1, newRow.length).setValues([newRow]);

    return ContentService
      .createTextOutput(JSON.stringify({ 'result': 'success', 'row': nextRow }))
      .setMimeType(ContentService.MimeType.JSON);
  } catch (e) {
    return ContentService
      .createTextOutput(JSON.stringify({ 'result': 'error', 'error': e.message }))
      .setMimeType(ContentService.MimeType.JSON);
  } finally {
    lock.releaseLock();
  }
}

   <form  method="post" id="enquiry_form" class="contact-form contact-form2">
                        <input type="hidden" name="sheet_name" value="Enquiry Form">
                        <div class="row">
                            <div class="col-12 form-group">
                                <input type="text" name="Name" class="form-control"  placeholder="Your Name" required/>
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" name="Ship_From" class="form-control"  placeholder="Ship From" required/>
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" name="Ship_To" class="form-control"  placeholder="Ship To" required/>
                            </div>
                            <div class="col-12 form-group">
                                <input type="number" name="Phone" class="form-control" placeholder="Phone No." required/>
                            </div>
                            <div class="col-12 form-group">
                                <textarea class="form-control" name="Message" placeholder="Type your message..." /></textarea>
                            </div>
                        </div>
                  
                        <div class="row">
                            <div class="col-12">
                                <div class="button text-center rounded-buttons">
                                    <button type="submit" class="btn primary-btn rounded-full gtm-fire" id="submitBtn">
                                        REQUEST A CALL BACK
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
const form1 = document.querySelector("#enquiry_form");
const form2 = document.querySelector("#contact_form");

form1.addEventListener("submit", handleSubmit);
form2.addEventListener("submit", handleSubmit);
async function handleSubmit(e) {
  e.preventDefault();

  const submitBtn = e.target.querySelector("button[type='submit']");
  submitBtn.innerHTML = "Please Wait!";

  try {
    const phone_no = document.getElementById("phone_no").value;
    console.warn(validatePhoneNumber(phone_no)); // Validate the phone number

    const formData = new FormData(e.target);
    const searchParams = new URLSearchParams();

    for (const pair of formData.entries()) {
      searchParams.append(pair[0], pair[1]);
    }

    const queryString = searchParams.toString();
    const url = `https://script.google.com/macros/s/AKfycbwluTGOi5qgqJeznOprJ5fgWI9-npKDD1ZAq6qEbqHlZubEbzAtlyr04jY6KcOKf68Bsw/exec?${queryString}`;
    const response = await fetch(url, {
      method: "GET",
    });

    const { result } = await response.json();

    if (result === "success") {
      e.target.reset();
          document.getElementById("response_msg").innerHTML = "<div class='alert alert-success p-1 text-center' style='font-size:12px; font-weight:bold'>Thank you for your query, We`ll contact you soon!</div>";
          document.getElementById("response_msg2").innerHTML = "<div class='alert alert-success p-1 text-center' style='font-size:15px; font-weight:bold'>Thank you for your query, We`ll contact you soon!</div>";
    } else {
          document.getElementById("response_msg").innerHTML = "<div class='alert alert-success p-1 text-center' style='font-size:12px; font-weight:bold'>Something wrong, Please try again</div>";
          document.getElementById("response_msg2").innerHTML = "<div class='alert alert-success p-1 text-center' style='font-size:15px; font-weight:bold'>Something wrong, Please try again</div>";
    }
  } catch (error) {
    console.error(error);
  } finally {
    submitBtn.innerHTML = "Submit";
  }
}