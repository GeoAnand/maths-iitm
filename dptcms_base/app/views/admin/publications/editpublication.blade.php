<section class="panel">    
    <header class="panel-heading font-bold">
        Publications : Edit Publication
    </header>
    
    <div class="panel-body">
      <form class="form-horizontal" role="form" method="post" action="{{url('admin/publications/addpublications/'.$getpublication->id)}}" id="addpublicationsform">        
        <div class="form-group">
          <label class="col-sm-2 control-label">Publication Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Publication Title" name="title" value="{{$getpublication->title}}" required />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Publication Authors</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Publication Authors" name="author" value="{{$getpublication->author}}" required />
          </div>      
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Publication Year</label>
          <div class="col-sm-10">
            <input type="number" min="1900" max="3000" pattern=".{4,4}" class="form-control" placeholder="Publication Year" required name="year" value="{{$getpublication->year}}" /></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Publication Journal</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Publication Journal" name="journal" value="{{$getpublication->journal}}">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Publication ISSN</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Publication ISSN" name="issn" value="{{$getpublication->issn}}"/>          
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Publication Abstract</label>
          <div class="col-sm-10">
            <textarea class="form-control" placeholder="Publication Abstract" name="abstract">{{$getpublication->abstract}}</textarea>          
          </div>
        </div>                
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="reset" class="btn btn-sm btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
              <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Update Publication</button>
            </div>
        </div>
      </form>
    </div>
  </section>
