<?php
class Artikel
{
	private $detais = array();
	private $changes = array();
	public function __construct($ticketID, $otrs)
	{
		$this->otrs = $otrs;
		$this->id = $ticketID;
	}
	public function setArticleTypeID($ArticleTypeID)
	{
		$this->changes[] = "ArticleTypeID";
		$this->detais["ArticleTypeID"]=$ArticleTypeID;
	}
	public function setArticleType($ArticleType)
	{
		$this->changes[] = "ArticleType";
		$this->detais["ArticleType"]=$ArticleType;
	}
	public function setSenderTypeID($SenderTypeID)
	{
		$this->changes[] = "SenderTypeID";
		$this->detais["SenderTypeID"]=$SenderTypeID;
	}
	public function setSenderType($SenderType)
	{
		$this->changes[] = "SenderType";
		$this->detais["SenderType"]=$SenderType;
	}
	public function setFrom($From)
	{
		$this->changes[] = "From";
		$this->detais["From"]=$From;
	}
	public function setSubject($Subject)
	{
		$this->changes[] = "Subject";
		$this->detais["Subject"]=$Subject;
	}
	public function setBody($Body)
	{
		$this->changes[] = "Body";
		$this->detais["Body"]=$Body;
	}
	public function setContentType($ContentType)
	{
		$this->changes[] = "ContentType";
		$this->detais["ContentType"]=$ContentType;
	}
	public function setCharset($Charset)
	{
		$this->changes[] = "Charset";
		$this->detais["Charset"]=$Charset;
	}
	public function setMimeType($MimeType)
	{
		$this->changes[] = "MimeType";
		$this->detais["MimeType"] = $MimeType;
	}
	public function setHistoryType($HistoryType)
	{
		$this->changes[] = "HistoryType";
		$this->detais["HistoryType"] = $HistoryType;
	}
	public function setHistoryComment($HistoryComment)
	{
		$this->changes[] = "HistoryComment";
		$this->detais["HistoryComment"] = $HistoryComment;
	}
	public function setAutoResponseType($AutoResponseType)
	{
		$this->changes[] = "AutoResponseType";
		$this->detais["AutoResponseType"] = $AutoResponseType;
	}
	public function setTimeUnit($TimeUnit)
	{
		$this->changes[] = "TimeUnit";
		$this->detais["TimeUnit"] = $TimeUnit;
	}
	public function setNoAgentNotify($NoAgentNotify)
	{
		$this->changes[] = "NoAgentNotify";
		$this->detais["NoAgentNotify"] = $NoAgentNotify;
	}
	public function setForceNotificationToUserID($ForceNotificationToUserID)
	{
		$this->changes[] = "ForceNotificationToUserID";
		$this->detais["ForceNotificationToUserID"] = $ForceNotificationToUserID;
	}
	public function setExcludeNotificationToUserID($ExcludeNotificationToUserID)
	{
		$this->changes[] = "ExcludeNotificationToUserID";
		$this->detais["ExcludeNotificationToUserID"] = $ExcludeNotificationToUserID;
	}
	public function setExcludeMuteNotificationToUserID($ExcludeMuteNotificationToUserID)
	{
		$this->changes[] = "ExcludeMuteNotificationToUserID";
		$this->detais["ExcludeMuteNotificationToUserID"] = $ExcludeMuteNotificationToUserID;
	}
	public function create()
	{
		foreach($this->changes as $change)
		{
			$params[$change]=$this->detais[$change];
		}
		$param = array(new SoapParam($this->id, "TicketID"),  new SoapParam($params, "Article"));
		$res = $this->otrs->callSoap("TicketUpdate", $param);
		var_dump($res);
	}
}
?>