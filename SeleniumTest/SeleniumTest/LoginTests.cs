using OpenQA.Selenium.Support.UI;
using OpenQA.Selenium;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using NUnit.Framework;
using OpenQA.Selenium.Chrome;

namespace SeleniumTest
{
    internal class LoginTests
    {
        private string BaseUrl { get; set; } = "http://localhost:5174/login";
        private IWebDriver webDriver { get; set; }
        private WebDriverWait wait { get; set; }

        [SetUp]
        public void Setup()
        {
            webDriver = new ChromeDriver();
            wait = new WebDriverWait(webDriver, TimeSpan.FromSeconds(20));
            webDriver.Manage().Timeouts().ImplicitWait = TimeSpan.FromSeconds(60);
            webDriver.Navigate().GoToUrl(BaseUrl);
            webDriver.Manage().Window.Maximize();
        }

        [TearDown]
        public void Cleanup()
        {
            webDriver.Quit();
        }

        [Test]
        public void GoToRegisterPage()
        {
            webDriver.FindElement(By.Id("register")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.Id("login")));
            Assert.AreEqual("http://localhost:5174/register", webDriver.Url);
        }

        [Test]
        public void LoginWithValidUser()
        {
            webDriver.FindElement(By.Id("username")).SendKeys("SellerMisi4");
            webDriver.FindElement(By.Id("password")).SendKeys("SellerMisi4");
            webDriver.FindElement(By.XPath("//button[@type='submit']")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.Id("dropdown")));
            Assert.AreEqual("http://localhost:5174/", webDriver.Url);
        }
        [Test]
        public void LoginWithInvalidUsername()
        {
            webDriver.FindElement(By.Id("username")).SendKeys("SellerMisi45");
            webDriver.FindElement(By.Id("password")).SendKeys("SellerMisi4");
            webDriver.FindElement(By.XPath("//button[@type='submit']")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.ClassName("alert")));

            Assert.AreEqual(webDriver.FindElement(By.ClassName("alert")).Text, "Wrong username or password!");
        }

        [Test]
        public void LoginWithInvalidPassword()
        {
            webDriver.FindElement(By.Id("username")).SendKeys("SellerMisi4");
            webDriver.FindElement(By.Id("password")).SendKeys("nemjo");
            webDriver.FindElement(By.XPath("//button[@type='submit']")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.ClassName("alert")));

            Assert.AreEqual(webDriver.FindElement(By.ClassName("alert")).Text, "Wrong username or password!");
        }


    }
}
