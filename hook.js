var someObj = {
hash: "8854655",
name: "qwerty",
family: "qwerton",
key: "1488",
url: "qweeeeeeee",
img_name: ".jpg"
};
var xhr = new XMLHttpRequest();
xhr.open('POST', 'process.php');
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.send('param=' + JSON.stringify(someObj));
xhr.onreadystatechange = function()
{
  if (this.readyState == 4)
  {
    if (this.status == 200)
    {
      console.log(xhr.responseText);
    }
    else
    {
      console.log('ajax error');
    }
  }
};