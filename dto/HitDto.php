<?php

namespace coderius\hitCounter\dto;

final class HitDto
{
    private $counter_id;
    private $cookie_mark;
    private $js_cookei_enabled;
    private $js_java_enabled;
    private $js_timezone_offset;
    private $js_timezone;
    private $js_connection;
    private $js_current_url;
    private $js_referer_url;
    private $js_screen_width;
    private $js_screen_height;
    private $js_color_depth;
    private $js_browser_language;
    private $js_history_length;
    private $js_is_toutch_device;
    private $js_processor_ram;
    private $serv_ip;
    private $serv_user_agent;
    private $serv_referer_url;
    private $serv_server_name;
    private $serv_auth_user_id;
    private $serv_port;
    private $serv_cookies;
    private $serv_os;
    private $serv_client;
    private $serv_device;
    private $serv_brand;
    private $serv_model;
    private $serv_bot;
    private $serv_host_by_ip;
    private $serv_is_proxy_or_vpn;

    public function __construct(
        $counter_id,
        $cookie_mark,
        $js_cookei_enabled,
        $js_java_enabled,
        $js_timezone_offset,
        $js_timezone,
        $js_connection,
        $js_current_url,
        $js_referer_url,
        $js_screen_width,
        $js_screen_height,
        $js_color_depth,
        $js_browser_language,
        $js_history_length,
        $js_is_toutch_device,
        $js_processor_ram,
        $serv_ip,
        $serv_user_agent,
        $serv_referer_url,
        $serv_server_name,
        $serv_auth_user_id,
        $serv_port,
        $serv_cookies,
        $serv_os,
        $serv_client,
        $serv_device,
        $serv_brand,
        $serv_model,
        $serv_bot,
        $serv_host_by_ip,
        $serv_is_proxy_or_vpn
    )
    {
        $this->counter_id = $counter_id;
        $this->cookie_mark = $cookie_mark;
        $this->js_cookei_enabled = $js_cookei_enabled;
        $this->js_java_enabled = $js_java_enabled;
        $this->js_timezone_offset = $js_timezone_offset;
        $this->js_timezone = $js_timezone;
        $this->js_connection = $js_connection;
        $this->js_current_url = $js_current_url;
        $this->js_referer_url = $js_referer_url;
        $this->js_screen_width = $js_screen_width;
        $this->js_screen_height = $js_screen_height;
        $this->js_color_depth = $js_color_depth;
        $this->js_browser_language = $js_browser_language;
        $this->js_history_length = $js_history_length;
        $this->js_is_toutch_device = $js_is_toutch_device;
        $this->js_processor_ram = $js_processor_ram;
        $this->serv_ip = $serv_ip;
        $this->serv_user_agent = $serv_user_agent;
        $this->serv_referer_url = $serv_referer_url;
        $this->serv_server_name = $serv_server_name;
        $this->serv_auth_user_id = $serv_auth_user_id;
        $this->serv_port = $serv_port;
        $this->serv_cookies = $serv_cookies;
        $this->serv_os = $serv_os;
        $this->serv_client = $serv_client;
        $this->serv_device = $serv_device;
        $this->serv_brand = $serv_brand;
        $this->serv_model = $serv_model;
        $this->serv_bot = $serv_bot;
        $this->serv_host_by_ip = $serv_host_by_ip;
        $this->serv_is_proxy_or_vpn = $serv_is_proxy_or_vpn;
    }


    /**
     * Get the value of counter_id
     */ 
    public function getCounterId()
    {
        return $this->counter_id;
    }

    /**
     * Get the value of cookie_mark
     */ 
    public function getCookieMark()
    {
        return $this->cookie_mark;
    }

    /**
     * Get the value of js_cookei_enabled
     */ 
    public function getJsCookeiEnabled()
    {
        return $this->js_cookei_enabled;
    }

    /**
     * Get the value of js_java_enabled
     */ 
    public function getJsJavaEnabled()
    {
        return $this->js_java_enabled;
    }

    /**
     * Get the value of js_timezone_offset
     */ 
    public function getJsTimezoneOffset()
    {
        return $this->js_timezone_offset;
    }

    /**
     * Get the value of js_timezone
     */ 
    public function getJsTimezone()
    {
        return $this->js_timezone;
    }

    

    /**
     * Get the value of js_current_url
     */ 
    public function getJsCurrentUrl()
    {
        return $this->js_current_url;
    }

    /**
     * Get the value of js_referer_url
     */ 
    public function getJsRefererUrl()
    {
        return $this->js_referer_url;
    }

    /**
     * Get the value of js_screen_width
     */ 
    public function getJsScreenWidth()
    {
        return $this->js_screen_width;
    }

    /**
     * Get the value of js_screen_height
     */ 
    public function getJsScreenHeight()
    {
        return $this->js_screen_height;
    }

    /**
     * Get the value of js_color_depth
     */ 
    public function getJsColorDepth()
    {
        return $this->js_color_depth;
    }

    /**
     * Get the value of js_browser_language
     */ 
    public function getJsBrowserLanguage()
    {
        return $this->js_browser_language;
    }

    /**
     * Get the value of js_history_length
     */ 
    public function getJsHistoryLength()
    {
        return $this->js_history_length;
    }

    /**
     * Get the value of js_is_toutch_device
     */ 
    public function getJsIsToutchDevice()
    {
        return $this->js_is_toutch_device;
    }

    /**
     * Get the value of js_processor_ram
     */ 
    public function getJsProcessorRam()
    {
        return $this->js_processor_ram;
    }

    /**
     * Get the value of serv_ip
     */ 
    public function getServIp()
    {
        return $this->serv_ip;
    }

    /**
     * Get the value of serv_user_agent
     */ 
    public function getServUserAgent()
    {
        return $this->serv_user_agent;
    }

    /**
     * Get the value of serv_referer_url
     */ 
    public function getServRefererUrl()
    {
        return $this->serv_referer_url;
    }

    /**
     * Get the value of serv_server_name
     */ 
    public function getServServerName()
    {
        return $this->serv_server_name;
    }

    /**
     * Get the value of serv_auth_user_id
     */ 
    public function getServAuthUserId()
    {
        return $this->serv_auth_user_id;
    }

        /**
         * Get the value of serv_port
         */ 
        public function getServPort()
        {
                return $this->serv_port;
        }

    /**
     * Get the value of serv_cookies
     */ 
    public function getServCookies()
    {
        return $this->serv_cookies;
    }

    /**
     * Get the value of serv_os
     */ 
    public function getServOs()
    {
        return $this->serv_os;
    }

    /**
     * Get the value of serv_client
     */ 
    public function getServClient()
    {
        return $this->serv_client;
    }

    /**
     * Get the value of serv_device
     */ 
    public function getServDevice()
    {
        return $this->serv_device;
    }

    /**
     * Get the value of serv_brand
     */ 
    public function getServBrand()
    {
        return $this->serv_brand;
    }

    /**
     * Get the value of serv_model
     */ 
    public function getServModel()
    {
        return $this->serv_model;
    }

    /**
     * Get the value of serv_bot
     */ 
    public function getServBot()
    {
        return $this->serv_bot;
    }

    /**
     * Get the value of serv_host_by_ip
     */ 
    public function getServHostByIp()
    {
        return $this->serv_host_by_ip;
    }

    /**
     * Get the value of serv_is_proxy_or_vpn
     */ 
    public function getServIsProxyOrVpn()
    {
        return $this->serv_is_proxy_or_vpn;
    }

    /**
     * Get the value of js_connection
     */ 
    public function getJsConnection()
    {
        return $this->js_connection;
    }
}