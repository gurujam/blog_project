<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * BlogPost
 *
 * @ORM\Table(name="blog_post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BlogPostRepository")
 */
class BlogPost
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="url_alias", type="string", length=255, unique=true)
     */
    private $urlAlias;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="published", type="datetime")
     */
    private $published;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=512, nullable=true)
     */
    private $image;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return BlogPost
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return BlogPost
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set urlAlias
     *
     * @param string $urlAlias
     *
     * @return BlogPost
     */
    public function setUrlAlias($urlAlias)
    {
        $this->urlAlias = $urlAlias;

        return $this;
    }

    /**
     * Get urlAlias
     *
     * @return string
     */
    public function getUrlAlias()
    {
        return $this->urlAlias;
    }

    /**
     * Set published
     *
     * @param \DateTime $published
     *
     * @return BlogPost
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return \DateTime
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Get published string
     *
     * @return string
     */
    public function getPublishedStr()
    {
        return $this->published->format('d/m/Y H:i');
    }

    /**
     * Get some of the content
     *
     * @return string
     */
    public function getSomeContent()
    {
        return substr($this->content,0,255);
    }

    /**
     * Get first $count words of the content
     *
     * @return string
     */
	function getSomeWords($count = 10)
	{
	  preg_match("/(?:[^\s,.;?!]+(?:[\s,.;?!]+|$)){0,$count}/", $this->content, $matches);
	  return $matches[0];
	}


    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }


}

