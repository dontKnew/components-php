# Google Tag Manager
This is an example of add google tag manager in your website and send google tag manager data to google sheet,  Please watch the youtube video for setup below script 

=> <a href="">Video Demo </a>

## Source Code
1. APP SCRIPT for received data from google tag manager & save in google sheet 
```javascript
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
```
2. Custom HTML for send data from google tag manager to google sheet 
```HTML
<script>
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'https://script.google.com/macros/s/AKfycbwluTGOi5qgqJeznOprJ5fgWI9-npKDD1ZAq6qEbqHlZubEbzAtlyr04jY6KcOKf68Bsw/exec?Category=Click&Label={{Click Text}}&sheet_name=Fire Tag&Date_Time', true);
  xhr.send();
</script>
```
