
function AddItem() {
  return (
      <div className="container text-center">
        <div className="row">
          <div className="col-6"><input type='text' placeholder='Enter Todo Here'></input>
          </div>
        <div className="col-4">
          <input type='date' width='100%'></input>
        </div>
        <div className="col-2">
          <button type="button" className="btn btn-success add-button">Add</button>
          </div> 
        </div>  
    </div>
  )
}

export default AddItem
