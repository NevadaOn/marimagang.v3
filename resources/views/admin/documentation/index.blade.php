@extends('layouts.superadmin')

@section('title', 'Kelola Bidang')

@section('content')
<style>
    .grid-wrapper {
    margin: 2rem auto;
    padding: 1rem;  
    }

  .image-grid-js {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin-top: 1rem;
  }

  .image-grid-js .image-box {
    width: calc(25% - 1rem);
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 6px;
    overflow: hidden;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    cursor: pointer;
  }

  .image-grid-js img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    display: block;
  }

  .caption {
    text-align: center;
    padding: 0.5rem;
    font-size: 0.85rem;
    color: #555;
  }

  @media (max-width: 768px) {
    .image-grid-js .image-box {
      width: calc(50% - 1rem);
    }
  }

  @media (max-width: 480px) {
    .image-grid-js .image-box {
      width: 100%;
    }
  }

  /* Modal styles */
  .modal {
    display: none;
    position: fixed;
    z-index: 50;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.6);
  }

  .modal-content {
    background-color: #fff;
    margin: 10% auto;
    padding: 2rem;
    border-radius: 8px;
    width: 90%;
    max-width: 500px;
    position: relative;
  }

  .close {
    position: absolute;
    top: 10px;
    right: 16px;
    font-size: 24px;
    font-weight: bold;
    color: #333;
    cursor: pointer;
  }
    .modal-content img {
    width: 100%;
    max-height: 60vh;
    object-fit: contain;
    display: block;
    margin: 0 auto;
    border-radius: 6px;
  }

  .modal-content {
    background-color: #fff;
    margin: 5% auto;
    padding: 1.5rem;
    border-radius: 8px;
    width: 90%;
    max-width: 600px;
    position: relative;
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
  }
</style>

<div class="grid-wrapper">
  <h2>Dokumentasi</h2>
  <a href="{{ route('admin.documentation.create') }}" class="btn-create">+ Tambah Dokumentasi</a>

  <div id="imageGrid" class="image-grid-js"></div>
</div>

<!-- Modal -->
<div id="imageModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <img id="modalImage" src="" alt="Gambar" class="w-full rounded mb-4">
    <p id="modalCaption" class="text-sm text-gray-700 mb-4"></p>
    <form id="deleteForm" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Hapus Gambar</button>
    </form>
  </div>
</div>

<script>
  const images = [
    @foreach ($documentations as $doc)
      @foreach ($doc->images as $img)
        {
          src: "{{ asset('storage/' . $img->image_path) }}",
          caption: @json($img->caption),
          deleteUrl: "{{ route('admin.documentation.destroy', $img->id) }}"
        },
      @endforeach
    @endforeach
  ];

  const grid = document.getElementById('imageGrid');
  const modal = document.getElementById('imageModal');
  const modalImage = document.getElementById('modalImage');
  const modalCaption = document.getElementById('modalCaption');
  const deleteForm = document.getElementById('deleteForm');

  function openModal(img) {
    modalImage.src = img.src;
    modalCaption.textContent = img.caption;
    deleteForm.action = img.deleteUrl;
    modal.style.display = 'block';
  }

  function closeModal() {
    modal.style.display = 'none';
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      closeModal();
    }
  }

  images.forEach(img => {
    const box = document.createElement('div');
    box.className = 'image-box';

    const image = document.createElement('img');
    image.src = img.src;
    image.alt = img.caption;
    image.onclick = () => openModal(img);

    const caption = document.createElement('div');
    caption.className = 'caption';
    caption.textContent = img.caption;

    box.appendChild(image);
    box.appendChild(caption);
    grid.appendChild(box);
  });
</script>
@endsection
