<?php

/**
 * @copyright  2020 Podlibre
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html AGPL3
 * @link       https://castopod.org/
 */

namespace App\Controllers\Admin;

use App\Models\EpisodeModel;
use App\Models\PodcastModel;

class Episode extends BaseController
{
    /**
     * @var \App\Entities\Podcast
     */
    protected $podcast;

    /**
     * @var \App\Entities\Episode|null
     */
    protected $episode;

    public function _remap($method, ...$params)
    {
        $this->podcast = (new PodcastModel())->getPodcastById($params[0]);

        if (count($params) > 1) {
            if (
                !($this->episode = (new EpisodeModel())
                    ->where([
                        'id' => $params[1],
                        'podcast_id' => $params[0],
                    ])
                    ->first())
            ) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }

        return $this->$method();
    }

    public function list()
    {
        $episodes = (new EpisodeModel())
            ->where('podcast_id', $this->podcast->id)
            ->orderBy('created_at', 'desc');

        $data = [
            'podcast' => $this->podcast,
            'episodes' => $episodes->paginate(10),
            'pager' => $episodes->pager,
        ];

        replace_breadcrumb_params([
            0 => $this->podcast->title,
        ]);
        return view('admin/episode/list', $data);
    }

    public function view()
    {
        $data = [
            'podcast' => $this->podcast,
            'episode' => $this->episode,
        ];

        replace_breadcrumb_params([
            0 => $this->podcast->title,
            1 => $this->episode->title,
        ]);
        return view('admin/episode/view', $data);
    }

    public function create()
    {
        helper(['form']);

        $data = [
            'podcast' => $this->podcast,
        ];

        replace_breadcrumb_params([
            0 => $this->podcast->title,
        ]);
        return view('admin/episode/create', $data);
    }

    public function attemptCreate()
    {
        $rules = [
            'enclosure' => 'uploaded[enclosure]|ext_in[enclosure,mp3,m4a]',
            'image' =>
                'is_image[image]|ext_in[image,jpg,png]|min_dims[image,1400,1400]|is_image_squared[image]',
            'publication_date' => 'valid_date[Y-m-d]|permit_empty',
            'publication_time' =>
                'regex_match[/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/]|permit_empty',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $newEpisode = new \App\Entities\Episode([
            'podcast_id' => $this->podcast->id,
            'title' => $this->request->getPost('title'),
            'slug' => $this->request->getPost('slug'),
            'enclosure' => $this->request->getFile('enclosure'),
            'description' => $this->request->getPost('description'),
            'image' => $this->request->getFile('image'),
            'parental_advisory' =>
                $this->request->getPost('parental_advisory') !== 'undefined'
                    ? $this->request->getPost('parental_advisory')
                    : null,
            'number' => $this->request->getPost('episode_number'),
            'season_number' => $this->request->getPost('season_number'),
            'type' => $this->request->getPost('type'),
            'block' => $this->request->getPost('block') == 'yes',
            'created_by' => user(),
            'updated_by' => user(),
        ]);
        $newEpisode->setPublishedAt(
            $this->request->getPost('publication_date'),
            $this->request->getPost('publication_time')
        );

        $episodeModel = new EpisodeModel();

        if (!($newEpisodeId = $episodeModel->insert($newEpisode, true))) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $episodeModel->errors());
        }

        // update podcast's episode_description_footer if changed
        $podcastModel = new PodcastModel();

        if ($this->podcast->hasChanged('episode_description_footer')) {
            $this->podcast->episode_description_footer = $this->request->getPost(
                'description_footer'
            );

            if (!$podcastModel->update($this->podcast->id, $this->podcast)) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('errors', $podcastModel->errors());
            }
        }

        return redirect()->route('episode-view', [
            $this->podcast->id,
            $newEpisodeId,
        ]);
    }

    public function edit()
    {
        helper(['form']);

        $data = [
            'podcast' => $this->podcast,
            'episode' => $this->episode,
        ];

        replace_breadcrumb_params([
            0 => $this->podcast->title,
            1 => $this->episode->title,
        ]);
        return view('admin/episode/edit', $data);
    }

    public function attemptEdit()
    {
        $rules = [
            'enclosure' =>
                'uploaded[enclosure]|ext_in[enclosure,mp3,m4a]|permit_empty',
            'image' =>
                'is_image[image]|ext_in[image,jpg,png]|min_dims[image,1400,1400]|is_image_squared[image]',
            'publication_date' => 'valid_date[Y-m-d]|permit_empty',
            'publication_time' =>
                'regex_match[/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/]|permit_empty',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->episode->title = $this->request->getPost('title');
        $this->episode->slug = $this->request->getPost('slug');
        $this->episode->description = $this->request->getPost('description');
        $this->episode->parental_advisory =
            $this->request->getPost('parental_advisory') !== 'undefined'
                ? $this->request->getPost('parental_advisory')
                : null;
        $this->episode->number = $this->request->getPost('episode_number');
        $this->episode->season_number = $this->request->getPost('season_number')
            ? $this->request->getPost('season_number')
            : null;
        $this->episode->type = $this->request->getPost('type');
        $this->episode->block = $this->request->getPost('block') == 'yes';
        $this->episode->setPublishedAt(
            $this->request->getPost('publication_date'),
            $this->request->getPost('publication_time')
        );
        $this->episode->updated_by = user();

        $enclosure = $this->request->getFile('enclosure');
        if ($enclosure->isValid()) {
            $this->episode->enclosure = $enclosure;
        }
        $image = $this->request->getFile('image');
        if ($image) {
            $this->episode->image = $image;
        }

        $episodeModel = new EpisodeModel();

        if (!$episodeModel->update($this->episode->id, $this->episode)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $episodeModel->errors());
        }

        // update podcast's episode_description_footer if changed
        $this->podcast->episode_description_footer = $this->request->getPost(
            'description_footer'
        );

        if ($this->podcast->hasChanged('episode_description_footer')) {
            $podcastModel = new PodcastModel();
            if (!$podcastModel->update($this->podcast->id, $this->podcast)) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('errors', $podcastModel->errors());
            }
        }

        return redirect()->route('episode-view', [
            $this->podcast->id,
            $this->episode->id,
        ]);
    }

    public function delete()
    {
        (new EpisodeModel())->delete($this->episode->id);

        return redirect()->route('episode-list', [$this->podcast->id]);
    }
}