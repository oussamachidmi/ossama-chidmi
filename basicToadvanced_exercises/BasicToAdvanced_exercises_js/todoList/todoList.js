
document.getElementById("addButton").addEventListener('click',(event)=>{
    let text= document.getElementById("textBox").value
    if(text.length>=1)
    {
        const span = document.createElement('span');
        span.className="todoText"
        span.innerHTML=text
        const button = document.createElement('button');
        button.innerHTML="Delete"
        button.addEventListener('click',(event)=>{
            event.target.parentNode.remove()
        })
        const li = document.createElement('li');
        li.className="todoItem"
        li.appendChild(span)
        li.appendChild(button)
        document.getElementById("todoList").appendChild(li)
        document.getElementById("textBox").value=""
    }
});