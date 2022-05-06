@php /** @var \App\Models\BlogPost $item */ @endphp
<div class="row justify-content-center" >
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if($item->is_published)
                    Опубликовано
                @else
                    Черновик
                @endif
                <div class="card-body">
                    <div class="card-title"></div>
                    <div class="card-subtitle mb-2 text-muted"></div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active"
                                    id="main-tab"
                                    data-bs-toggle="tab"
                                    type="button"
                                    data-bs-target="#main"
                                    role="tab"
                                    aria-controls="main"
                                    aria-selected="true"
                            >Основные данные</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link"
                                    id="add-tab"
                                    data-bs-toggle="tab"
                                    type="button"
                                    data-bs-target="#add"
                                    role="tab"
                                    aria-controls="add"
                                    aria-selected="true"
                            >Доп данные</button>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="main" role="tabpanel" aria-labelledby="main-tab">
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input name="title" value="{{ $item->title }}"
                                       id="title"
                                       type="text"
                                       class="form-control"
                                       minlength="3"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="slug">Статья</label>
                                <textarea name="content_raw"
                                          id="content_raw"
                                          class="form-control"
                                          rows="20">
                                    {{ old('content_raw', $item->content_raw) }}
                                </textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="form-group">
                                <label for="parent_id">Категория</label>
                                <select name="category_id"
                                        id="category_id"
                                        class="form-control"
                                        placeholder="Выберете категорию"
                                        required>
                                    @foreach($categoryList as $categoryOption)
                                        <option value="{{ $categoryOption->id }}"
                                                @if($categoryOption->id == $item->parent_id) selected @endif>
                                            {{ $categoryOption->id_title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="slug">Символьный код</label>
                                <input name="slug" value="{{ $item->slug }}"
                                       id="slug"
                                       type="text"
                                       class="form-control"
                                >
                            </div>
                            <div class="form-group">
                                <label for="slug">Анонс</label>
                                <textarea name="excerpt" value="{{ $item->slug }}"
                                          id="excerpt"
                                          class="form-control"
                                          rows="3">{{ old('excerpt', $item->excerpt) }}</textarea>
                            </div>
                            <div class="form-check">
                                <input name="is_published"
                                       type="hidden"
                                       value="0">
                                <input name="is_published"
                                       type="checkbox"
                                       class="form-check-input"
                                       value="1"
                                       @if($item->is_published)
                                       checked="checked"
                                    @endif
                                >
                                <label class="form-check-label" for="is_published">Опубликовано</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
