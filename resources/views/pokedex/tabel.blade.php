<div class="card-body p-0 ">
    <div id="tableScrollArea" class="table-responsive overflow-auto">
        <table class="table table-hover table-fixed mb-0">
            <thead class="sticky-top bg-white shadow-sm">
                <tr>
                    <th class="fw-bold text-secondary w-5">ID</th>
                    <th class="fw-bold text-secondary w-15">Image</th>
                    <th class="fw-bold text-secondary w-15">Name</th>
                    <th class="fw-bold text-secondary w-15">Type</th>
                    <th class="fw-bold text-secondary w-15">Species</th>
                    <th class="fw-bold text-secondary w-15"></th>
                    <th class="fw-bold text-secondary w-15"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pokedexes as $pokedex) { ?>
                <tr>
                    <td class="align-middle">{{ $pokedex->id }}</td>
                    <td>
                        <img src="{{ $pokedex->image_url }}" alt="{{ $pokedex->name }}"
                            class="img-fluid rounded-3 shadow-sm border bg-white"
                            style="width: 100px; height: 100px; object-fit: contain;">
                    </td>
                    <td class="align-middle fw-bold">
                        <a class=" link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                            href="/pokedex/{{ $pokedex->id }}">{{ $pokedex->name }}</a>
                    </td>
                    <td class="align-middle">
                        <?php foreach($pokedex->type as $type) { ?>
                        <span class="badge bg-primary bg-gradient me-1 mb-1">{{ $type }}</span>
                        <?php } ?>
                    </td>
                    <td class="align-middle">{{ $pokedex->species }}</td>
                    <td class="align-middle">
                        <a class="btn btn-warning btn-sm" href="/pokedex/{{ $pokedex->id }}/edit">แก้ไข</a>
                    </td>
                    <td class="align-middle">
                        <form action="/pokedex/{{ $pokedex->id }}" method="post" style="display:inline;">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm" type="submit">ลบ</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>