<?php
namespace Industrialist\Modules\Shortcodes\Lib;

use Industrialist\Modules\Shortcodes\AccordionHolder\AccordionHolder;
use Industrialist\Modules\Shortcodes\Accordion\Accordion;
use Industrialist\Modules\Shortcodes\Blockquote\Blockquote;
use Industrialist\Modules\Shortcodes\BlogList\BlogList;
use Industrialist\Modules\Shortcodes\Button\Button;
use Industrialist\Modules\Shortcodes\CallToAction\CallToAction;
use Industrialist\Modules\Shortcodes\Charts\Charts;
use Industrialist\Modules\Shortcodes\ContentSliderHolder\ContentSliderHolder;
use Industrialist\Modules\Shortcodes\ContentSlider\ContentSlider;
use Industrialist\Modules\Shortcodes\Counter\Countdown;
use Industrialist\Modules\Shortcodes\Counter\Counter;
use Industrialist\Modules\Shortcodes\CustomFont\CustomFont;
use Industrialist\Modules\Shortcodes\Dropcaps\Dropcaps;
use Industrialist\Modules\Shortcodes\ElementsHolder\ElementsHolder;
use Industrialist\Modules\Shortcodes\ElementsHolderItem\ElementsHolderItem;
use Industrialist\Modules\Shortcodes\FrameSlider\FrameSlider;
use Industrialist\Modules\Shortcodes\GoogleMap\GoogleMap;
use Industrialist\Modules\Shortcodes\Highlight\Highlight;
use Industrialist\Modules\Shortcodes\Icon\Icon;
use Industrialist\Modules\Shortcodes\IconWithText\IconWithText;
use Industrialist\Modules\Shortcodes\ImageGallery\ImageGallery;
use Industrialist\Modules\Shortcodes\InfoBox\InfoBox;
use Industrialist\Modules\Shortcodes\ImageWithHoverInfo\ImageWithHoverInfo;
use Industrialist\Modules\Shortcodes\ImageWithHoverInfoItem\ImageWithHoverInfoItem;
use Industrialist\Modules\Shortcodes\Lists\Lists;
use Industrialist\Modules\Shortcodes\Message\Message;
use Industrialist\Modules\Shortcodes\PricingSlider\PricingSlider;
use Industrialist\Modules\Shortcodes\PricingTableHolder\PricingTableHolder;
use Industrialist\Modules\Shortcodes\PricingTable\PricingTable;
use Industrialist\Modules\Shortcodes\ProcessHolder\ProcessHolder;
use Industrialist\Modules\Shortcodes\Process\Process;
use Industrialist\Modules\Shortcodes\ProgressBar\ProgressBar;
use Industrialist\Modules\Shortcodes\ProgressCircle\ProgressCircle;
use Industrialist\Modules\Shortcodes\SectionTitle\SectionTitle;
use Industrialist\Modules\Shortcodes\Separator\Separator;
use Industrialist\Modules\Shortcodes\ServiceTable\ServiceTable;
use Industrialist\Modules\Shortcodes\SocialShare\SocialShare;
use Industrialist\Modules\Shortcodes\TabHolder\TabHolder;
use Industrialist\Modules\Shortcodes\Tab\Tab;
use Industrialist\Modules\Shortcodes\Team\Team;
use Industrialist\Modules\Shortcodes\TwitterSlider\TwitterSlider;
use Industrialist\Modules\Shortcodes\VideoBanner\VideoBanner;
use Industrialist\Modules\Shortcodes\VideoButton\VideoButton;
use Industrialist\Modules\Shortcodes\Workflow\Workflow;
use Industrialist\Modules\Shortcodes\WorkflowItem\WorkflowItem;


/**
 * Class ShortcodeLoader
 */
class ShortcodeLoader
{
    /**
     * @var private instance of current class
     */
    private static $instance;
    /**
     * @var array
     */
    private $loadedShortcodes = array();

    /**
     * Private constuct because of Singletone
     */
    private function __construct() {
    }

    /**
     * Private sleep because of Singletone
     */
    private function __wakeup() {
    }

    /**
     * Private clone because of Singletone
     */
    private function __clone() {
    }

    /**
     * Returns current instance of class
     * @return ShortcodeLoader
     */
    public static function getInstance() {
        if (self::$instance == null) {
            return new self;
        }

        return self::$instance;
    }

    /**
     * Adds new shortcode. Object that it takes must implement ShortcodeInterface
     * @param ShortcodeInterface $shortcode
     */
    private function addShortcode(ShortcodeInterface $shortcode) {
        if (!array_key_exists($shortcode->getBase(), $this->loadedShortcodes)) {
            $this->loadedShortcodes[$shortcode->getBase()] = $shortcode;
        }
    }

    /**
     * Adds all shortcodes.
     *
     * @see ShortcodeLoader::addShortcode()
     */
    private function addShortcodes() {
        $this->addShortcode(new AccordionHolder());
        $this->addShortcode(new Accordion());
        $this->addShortcode(new Blockquote());
        $this->addShortcode(new BlogList());
        $this->addShortcode(new Button());
        $this->addShortcode(new CallToAction());
        $this->addShortcode(new Charts());
        $this->addShortcode(new ContentSliderHolder());
        $this->addShortcode(new ContentSlider());
        $this->addShortcode(new Counter());
        $this->addShortcode(new Countdown());
        $this->addShortcode(new CustomFont());
        $this->addShortcode(new Dropcaps());
        $this->addShortcode(new ElementsHolder());
        $this->addShortcode(new ElementsHolderItem());
        $this->addShortcode(new FrameSlider());
        $this->addShortcode(new GoogleMap());
        $this->addShortcode(new Highlight());
        $this->addShortcode(new Icon());
        $this->addShortcode(new IconWithText());
        $this->addShortcode(new ImageGallery());
        $this->addShortcode(new ImageWithHoverInfo());
        $this->addShortcode(new ImageWithHoverInfoItem());
        $this->addShortcode(new InfoBox());
        $this->addShortcode(new Lists());
        $this->addShortcode(new Message());
        $this->addShortcode(new PricingSlider());
        $this->addShortcode(new PricingTableHolder());
        $this->addShortcode(new PricingTable());
        $this->addShortcode(new ProcessHolder());
        $this->addShortcode(new Process());
        $this->addShortcode(new ProgressBar());
        $this->addShortcode(new ProgressCircle());
        $this->addShortcode(new SectionTitle());
        $this->addShortcode(new Separator());
        $this->addShortcode(new ServiceTable());
        $this->addShortcode(new SocialShare());
        $this->addShortcode(new TabHolder());
        $this->addShortcode(new Tab());
        $this->addShortcode(new Team());
        $this->addShortcode(new TwitterSlider());
        $this->addShortcode(new VideoBanner());
        $this->addShortcode(new VideoButton());
        $this->addShortcode(new Workflow());
        $this->addShortcode(new WorkflowItem());
    }

    /**
     * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
     * of each shortcode object
     */
    public function load() {
        $this->addShortcodes();

        foreach ($this->loadedShortcodes as $shortcode) {
            add_shortcode($shortcode->getBase(), array($shortcode, 'render'));
        }
    }
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();