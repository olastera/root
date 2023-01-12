
const delete_btn = async (page)=>{
    console.log(page);
  const response = await fetch(page)
  .then(res => res.ok ? Promise.resolve(res) : Promise.reject(res))
  .then(res => res.text() )
  .then(res => {
    return res;
  });
   //location.reload();
}

const cargar_contenido = async (page,div)=>{
  // console.log(page);
  const response = await fetch(page)
  .then(res => res.ok ? Promise.resolve(res) : Promise.reject(res))
  .then(res => res.text() )
  .then(res => {
    console.log(res);
    return res;
  });
  if(div!="") {
    await div_load (div,response)
  }
}

const FetchGet = async (page,div)=>{
  // console.log(page);
  const response = await fetch(page)
  .then(res => res.ok ? Promise.resolve(res) : Promise.reject(res))
  .then(res => res.json() )
  .then(res => {
    return res;
  });
  switch (response['tipo']) {
    case 'redirect':
       window.location.href = response['url'];
      break;
    case 'div':
      div = document.getElementById(div);
      div.innerHTML = "";
      div.innerHTML = '<div class="alert alert-danger mb-2">'+response['msg']+'</div>';
      break;
    case 'ok':
      form = document.getElementById(form);
      form.parentElement.innerHTML = '<div class="alert alert-success p-5 m-5 text-center"><i class="bx bx-badge-check bx-lg"></i><br> <h4 class="mb-0 mt-3 display-6">'+response['msg']+'</h4></div>';
      if(response['link']) {
         window.location.href = response['url'];
      }
      break;
    default:

  }
}


const f_cargar_contenido_post = async (page,div,json)=>{
	 // console.log(json);
 	 var data = new FormData();
	    data.append( "json", json );

	    const response = await fetch(page,{
	    	method: 'POST',
	    	body: data ,
        dataType: "jSON"
		 })
	 .then(res => res.ok ? Promise.resolve(res) : Promise.reject(res))
	 .then(res => res.text() )
	 .then(res => {
			 return res;
	 });
	    // console.log(response);
     if(div!="") {
       await div_load (div,response)
    }
}

const f_cargar_contenido_post_formdata = async (page,div,data)=>{
	 // console.log(json);
 	    const response = await fetch(page,{
	    	method: 'POST',
	    	body: data ,
        dataType: "jSON"
		 })
	 .then(res => res.ok ? Promise.resolve(res) : Promise.reject(res))
	 .then(res => res.text() )
	 .then(res => {
			 return res;
	 });
	    // console.log(response);
     if(div!="") {
       await div_load (div,response)
    }
}


const div_load= (div,res)=>{
  const divr = document.getElementById(div)
  console.log(divr);
  divr.innerHTML = ''
  const fragment = document.createDocumentFragment()
  const newdiv = document.createElement('div');
  newdiv.innerHTML = res
  fragment.appendChild(newdiv)
  divr.appendChild(fragment)
}


//
//
// // selectElement
  function selectElement(id, valueToSelect) {
  	let element = document.getElementById(id);
  	 element.value = valueToSelect;
  }
 
// // FETCHS
const FetchPost = async (page, data, div, form) => {
  const response = await fetch(page, {
    method: 'POST',
    body: data,
    dataType: "jSON"
  })
  .then(res => res.ok ? Promise.resolve(res) : Promise.reject(res))
  .then(res => res.json())
  .then(res => {
    return res;
  });
   //console.log(response);
  switch (response['tipo']) {
    case 'redirect':
       window.location.href = response['url'];
      break;
    case 'div':
      div = document.getElementById(div);
      div.innerHTML = "";
      div.innerHTML = '<div class="alert alert-danger mb-2">'+response['msg']+'</div>';
      break;
    case 'ok':
      form = document.getElementById(form);
      form.parentElement.innerHTML = '<div class="alert alert-success p-5 m-5 text-center"><i class="bx bx-badge-check bx-lg"></i><br> <h4 class="mb-0 mt-3 display-6">'+response['msg']+'</h4></div>';
      if(response['link']) {
         window.location.href = response['url'];
      }
      break;
    default:

  }
}
 



 
 
