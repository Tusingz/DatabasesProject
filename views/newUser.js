var sendResult = document.getElementById('Submit');
var fieldHolder = document.getElementsByClassName('user'); //holds text fields values

function validate() //check if text values have been filled out
{
  for (var i = 0; i < fieldHolder.length - 1; i++)
  {
    if (fieldHolder[i].value == '')
    {
      alert("Please complete all fields before clicking 'Submit'.");
      return false;
    }
    console.log(fieldHolder[i]);
  }
  return true;
}
