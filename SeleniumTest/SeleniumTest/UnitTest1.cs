using NUnit.Framework;
using OpenQA.Selenium.Chrome;
using OpenQA.Selenium;
using System;
using OpenQA.Selenium.Support.UI;
using System.Threading;

namespace SeleniumTest
{
    public class Tests
    {
        private string BaseUrl { get; set; } = "http://localhost:5174/";
        private IWebDriver webDriver { get; set; }

        [SetUp]
        public void Setup()
        {
            webDriver = new ChromeDriver();
            webDriver.Manage().Timeouts().ImplicitWait = TimeSpan.FromSeconds(90);
        }

        [Test]
        public void NavBarTestWithoutLogin()
        {
            webDriver.Navigate().GoToUrl(BaseUrl);
            webDriver.Manage().Window.Maximize();

            Assert.AreEqual(BaseUrl, webDriver.Url);

            webDriver.FindElement(By.CssSelector(".nav-item:nth-child(1)>a")).Click();
            Assert.AreEqual("http://localhost:5174/productsonly", webDriver.Url);

            webDriver.FindElement(By.CssSelector(".nav-item:nth-child(2)>a")).Click();
            Assert.AreEqual("http://localhost:5174/mechanicsonly", webDriver.Url);

            webDriver.FindElement(By.CssSelector(".nav-item:nth-child(3)>a")).Click();
            Assert.AreEqual("http://localhost:5174/register", webDriver.Url);

            webDriver.Navigate().GoToUrl(BaseUrl);
            webDriver.FindElement(By.CssSelector("#reglog>.nav-item:nth-child(1)>a")).Click();
            Assert.AreEqual("http://localhost:5174/register", webDriver.Url);

            webDriver.Navigate().GoToUrl(BaseUrl);
            webDriver.FindElement(By.CssSelector("#reglog>.nav-item:nth-child(2)>a")).Click();
            Assert.AreEqual("http://localhost:5174/login", webDriver.Url);
        }

        [Test]
        public void LoginTest()
        {
            webDriver.Navigate().GoToUrl(BaseUrl);
            webDriver.Manage().Window.Maximize();
            webDriver.FindElement(By.CssSelector("#reglog>.nav-item:nth-child(2)>a")).Click();
            Assert.AreEqual("http://localhost:5174/login", webDriver.Url);

            webDriver.FindElement(By.Id("username")).SendKeys("SellerMisi4");
            webDriver.FindElement(By.Id("password")).SendKeys("SellerMisi4");
            webDriver.FindElement(By.XPath("//button[@type='submit']")).Click();

            Thread.Sleep(15000);
            Assert.AreEqual(BaseUrl, webDriver.Url);
        }


        [TearDown]
        public void Cleanup()
        {
            webDriver.Quit();
        }
    }
}