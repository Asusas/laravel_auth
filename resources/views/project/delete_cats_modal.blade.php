{{-- Modal on delete START--}}

<div class="modal fade" id="exampleModal-{{ $cats->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ar tikrai norite istrinti sia kategorija?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p style="color: red"><b>Istrindami kategorija istrinsite ir visus straipsnius susijusius su ja.</b></p>
            <hr>
            Trinama kategorija: <b>{{ $cats->name }}</b>
          </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Ne</button>
            <form class="list-inline-item" action="{{ route('categories.destroy', $cats->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-success" value="Taip" />
            </form>
        </div>
      </div>
    </div>
  </div>

  {{-- Modal on delete END--}}